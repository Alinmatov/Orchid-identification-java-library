# Orchid-identification-java-library

### Compile
`javac -classpath "lib;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;lib\CalEn.jar" lib\TestCalEn.java`

### Run
`java -Djava.library.path=C:\Program Files\MATLAB\MATLAB Runtime\v901\runtime\win64`
`java -cp "lib;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;lib\CalEn.jar" TestCalEn photos\test_orchid_photo.jpg`

`java -cp "C:\Program Files\MATLAB\MATLAB Runtime\v901\runtime\win64;C:\AppServ\www\orchid-api\api\lib;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;C:\AppServ\www\orchid-api\api\lib\CalEn.jar" TestCalEn photos\test_orchid_photo.jpg`


`java -cp "lib;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;lib\CalEn.jar" TestCalEn photos\test_orchid_photo.jpg`

### Client side
`java -classpath "lib;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;lib\CalEn.jar" -Djava.rmi.server.codebase="lib;C:/Program Files/MATLAB/MATLAB Runtime/v901/toolbox/javabuilder/jar/javabuilder.jar;lib/CalEn.jar"  TestCalEn photos\test_orchid_photo.jpg`



### Test with curl
`curl --form "photo=@.\api\orchid-photos\cattleya.jpg" http://localhost/orchid-api/api/orchid.php` 
