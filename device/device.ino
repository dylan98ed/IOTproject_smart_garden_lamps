#include <WiFiManager.h> // https://github.com/tzapu/WiFiManager
#include <ESP8266WiFi.h>
#include <strings_en.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>


//String url="http://localhost/iluminacion-jardin-local/IOTproject_smart_garden_lamps/send.php"; //php file to send data

//Para usar en la web
String protocolo="http://";
String host="localhost";
String recurso="/iluminacion-jardin-local/IOTproject_smart_garden_lamps/send.php";
int port=80;

String url=protocolo+host+recurso;

//data
String device="node1";//device name
int lampara1;
int lampara2;
    
void setup() {
  // WiFi.mode(WiFi_STA); // it is a good practice to make sure your code sets wifi mode how you want it.
  WiFi.mode(WIFI_STA); // explicitly set mode, esp defaults to STA+AP
  Serial.begin(115200);

  //WiFiManager, Local intialization. Once its business is done, there is no need to keep it around
  WiFiManager wm;
  
  bool res;
  // res = wm.autoConnect(); // auto generated AP name from chipid
  // res = wm.autoConnect("AutoConnectAP"); // anonymous ap
  res = wm.autoConnect("AutoConnectAP","password"); // password protected ap

  if(!res) {
      Serial.println("Failed to connect");
      // ESP.restart();
  } 
  else {
      //if you get here you have connected to the WiFi    
      Serial.println("connected...yeey :)");
  }

  //the device is already connected
  //declaration pin mode of lamps
  pinMode(D0,OUTPUT);
  pinMode(D1,OUTPUT);
}

void loop() {
  //Prepare the string to send by GET method
  String getData="?dispositivo="+device+"&lamparauno="+String(lampara1)+"&lamparados="+String(lampara2);
    
  WiFiClient client;
  HTTPClient http; //create the object of the HTTPClient type
  http.begin(client,url+getData);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");//Protocol header
     
  int httpCode=http.GET(); //Sent by GET method
  String respuesta=http.getString();//200=OK -1=ERROR

  Serial.println("RESPUESTA DEL SERVIDOR");
  Serial.println(httpCode);
  Serial.println(respuesta);
  Serial.println("--------------------------");

  //response format: {LAMP1:1,LAMP2:0}
  
  int ini=respuesta.indexOf(":");
  int fin=respuesta.indexOf(",",ini);
  lampara1=respuesta.substring(ini+1, fin).toInt();

  ini=respuesta.indexOf(":",fin);
  fin=respuesta.indexOf("}",ini);
  lampara2=respuesta.substring(ini+1, fin).toInt();
  
  delay(500);
  http.end();
  Serial.println("VALORES GUARDADOS EN LAS VARIABLES");
  Serial.print("variable LAMP1:");
  Serial.print(lampara1);
  Serial.print("      variable LAMP2:");
  Serial.println(lampara2);
  Serial.println("--------------------------");

  //turn the lamp1 on or off
  if(lampara1==1){
    digitalWrite(D0,HIGH);
  }else{
    digitalWrite(D0,LOW);
  }
  
  //turn the lamp2 on or off
  if(lampara2==1){
    digitalWrite(D1,HIGH); 
  }else{
    digitalWrite(D1,LOW);
  }
  delay(1000);
}
