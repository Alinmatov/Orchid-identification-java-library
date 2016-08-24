#!/bin/bash
# Orchid

# MCR path
export LD_LIBRARY_PATH=/usr/local/bin/MATLAB/MATLAB_Runtime/v901/runtime/glnxa64:/usr/local/bin/MATLAB/MATLAB_Runtime/v901/bin/glnxa64:/usr/local/bin/MATLAB/MATLAB_Runtime/v901/sys/os/glnxa64:

# Compile
javac -cp /usr/local/bin/MATLAB/MATLAB_Runtime/v901/toolbox/javabuilder/jar/javabuilder.jar:lib/CalEn.jar:lib lib/TestCalEn.java

#Run
java -cp /usr/local/bin/MATLAB/MATLAB_Runtime/v901/toolbox/javabuilder/jar/javabuilder.jar:lib/CalEn.jar:lib TestCalEn lib/test_orchid_photo.jpg 2>&1
