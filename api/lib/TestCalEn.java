import com.mathworks.toolbox.javabuilder.*;
import CalEn.*;

/**
 * Mac
 * Compile command
 * ===============
 * javac -cp .:/Applications/MATLAB/MATLAB_Runtime/v901/toolbox/javabuilder/jar/javabuilder.jar:CalEn.jar TestCalEn.java
 *
 * Run command
 * ===========
 * java -cp .:/Applications/MATLAB/MATLAB_Runtime/v901/toolbox/javabuilder/jar/javabuilder.jar:CalEn.jar TestCalEn test_orchid_photo.jpg
 */
class TestCalEn {
    public static void main(String[] args) {
		
        MWCharArray n = null;
        Object[] result = null;
        ImageEnergy theMagic = null;

        if (args.length == 0) {
            System.out.println("Error: must input a positive integer");
            return;
        }

        try {
            theMagic = new ImageEnergy();

            result = theMagic.CalEn(1, args[0]);
            System.out.println(result[0]);
        } catch (MWException e) {
            System.out.println("Exception: " + e.toString());
        }

        try {
            MWArray.disposeArray(result);
            theMagic.dispose();
        } catch (NullPointerException e) {
            System.out.println("Exception: " + e.toString());
        }
    }
}
