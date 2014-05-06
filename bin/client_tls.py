# usage: python client.py '{"host":"127.0.0.1","port":22221}' Help
import pickle
import socket,ssl
import threading
import ConfigParser
import cgi, os
import cgitb
import hashlib
from Crypto.Cipher import AES
from Crypto import Random
import base64
import os, errno,sys
import signal
import json

path = os.path.dirname(os.path.realpath(__file__))



def signal_handler(signal, frame):
        print 'You pressed Ctrl+C!'
        sys.exit(0)

signal.signal(signal.SIGINT, signal_handler)



params = [];
command = "";


def Ping(client,params=[]):
   client.send ( 'Ping' )
   Pong = client.recv ( 1024 ) 
   if ( Pong == "Pong" ):
      print "Connection Tested!"
      return 1 
   else:
      print "No Connection!"
      return 0

def Help(client,params=[]):
   client.send (  'Help' )
   print ( client.recv ( 1024 ) )
def ListCatalog(client,params=[]):
   client.send ( 'ListCatalog' )
   print  client.recv ( 1024 ) 
def DeleteFromCatalog(client,params=[]):
    pass
def UpdateCatalogList(client,params=[]):
    pass

def AddToCatalog(client,params=[]):
   client.send (  'AddToCatalog' )
   try:
      params[0]
   except Exception, e:
      print "AddToCatalog:No file path specified"
      client.close()
      return
   else:
      file_path=params[0]
   
      try:
         params[1]
      except Exception, e:
         print "AddToCatalog:No filename specified"
         client.close()
         return
      else: 
         filename=params[1]

   print "File sending %s" % file_path
   response = client.recv ( 1024 )

   key = hashlib.sha256(filename).digest()[:32]
   print str (key)
   vi = hashlib.sha256(filename).digest()[:16]
   print str ( vi)
   encryptOBJ = AES.new(key, AES.MODE_CFB, vi)
   
   if ('Ready' == response ):
      print "Client is Ready"
      client.send(filename)

   response = client.recv ( 1024)
   if (filename == response):
      print "HandShaked"
   else:
      print "Wrong HandShake"
      client.close()
      return

   readByte = open(file_path, "rb")
   data = readByte.read()
   encodedData = base64.b64encode(data)

   encryptedData = encryptOBJ.encrypt(encodedData)
   readByte.close()
   client.send(encryptedData)
   print "File sent as %s" % filename

def GetMd5(client,params=[]):
    try:
        #print "getting md5 of file"
        client.send('GetMd5')
        response = client.recv(1024).strip()
        #print "response is " + response
        if(response=="OK"):
                client.send(params[0])
        response = client.recv (1024)
        print response
    except Exception,e:
        print "ERROR"
    finally:
	client.close()
    
def GetFile(client,params=[]):

    client.send (  'GetFile' )
    try:
      params[0]
    except Exception, e:
      print "GetFile:No filename specified"
      client.close()
      return
    else: 
      filename=params[0]
      try:
        params[1]
      except Exception, e:
        print "GetFile:No file path specified"
        client.close()
        return
      else:
        print client.recv (1024)
        filepath=params[1]
        print "FileRequested: %s " % filename

        client.send (filename)
        
        response = client.recv ( 1024 ) 
        print "Response: %s " % response
        if (response == "OK"):
          client.send("Ready")

          createFile = open(filepath, "wb")   
          print "New file is to written: %s " % filepath
          k=0
          while True:
              data = client.recv(1024)
              k+=1
              if ( data == "Bitiriyoruz"): break 
              createFile.write(data)
          print str( round (k * 1.00 / 1024 , 2 ) ) + "MB transferred"
          print "File written"
          createFile.close()
        

        
def GetFileChuncked(client,params=[]):
    print "yakalandi"
    client.send ('GetFileChuncked')
    try:
      params[0]
    except Exception, e:
      print "GetFile:No filename specified"
      client.close()
      return
    else: 
      filename=params[0]
      try:
        params[1]
      except Exception, e:
        print "GetFile:No file path specified"
        client.close()
        return
      else:
        print client.recv (1024)
        filepath=params[1]
        print "FileRequested: %s " % filename

        client.send (filename)
        
        response = client.recv ( 1024 ) 
        print "Response: %s " % response
        if (response == "OK\n"):
          client.send("Ready")

          hash_var=client.recv (1024)#egemen
          print "Length and hash:%s" %hash_var#egemen
          client.send("0")#egemen

          createFile = open(filepath, "wb")   
          print "New file is to written: %s " % filepath
          k=0
          while True:
              data = client.recv(1024)
              k+=1
              if ( data == "\x00" ): break 
              createFile.write(data)
          print str( round (k * 1.00 / 1024 , 2 ) ) + "MB transferred"
          print "File written"
          createFile.close()

def ServeFileToReader(client,params=[]):
    pass
    
methods = {
        'Ping': Ping ,
        'Help': Help ,
        'ListCatalog': ListCatalog,
        'DeleteFromCatalog': DeleteFromCatalog,
        'UpdateCatalogList': UpdateCatalogList,
        'AddToCatalog': AddToCatalog,
        'ServeFileToReader': ServeFileToReader ,
        'GetFile': GetFile,
        'GetFileChuncked': GetFileChuncked,
	'GetMd5': GetMd5
    }



# Here's our thread:
class ConnectionThread ( threading.Thread ):

   def run ( self ):

      # Connect to the server:
      client = socket.socket ( socket.AF_INET, socket.SOCK_STREAM )
      ssl_sock = ssl.wrap_socket(client,
                           ca_certs=path+"/cloud_cert.crt",
                           cert_reqs=ssl.CERT_REQUIRED,
                           suppress_ragged_eofs=False)
      try:
         sys.argv[1]
      except IndexError:
         print "No Server-Client Mentioned"
      else:
         try:
            connection = json.loads(sys.argv[1])
         except ValueError:
            print sys.argv[1]
         else:
            try:
               ssl_sock.connect ( ( connection["host"], connection["port"] ) )
            except Exception, e:
               print e
               print "Not connected"
               return
            else:
               try:
                  sys.argv[2]
               except IndexError:
                  Ping(ssl_sock)   
               else:
                  command = sys.argv[2]
                  try:
                     sys.argv[3:]
                  except IndexError:
                     print "No Parameters Included"
                  else:
                     params = sys.argv[3:]

                     try:
                        methods[command]
                     except Exception, e:
                        print "No Method Found %s" % command
                     else:
                        methods[command](ssl_sock,params)




      # Close the connection
      ssl_sock.close()

# Let's spawn a few threads:
ConnectionThread().start()
