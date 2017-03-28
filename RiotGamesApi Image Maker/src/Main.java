import java.awt.AlphaComposite;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.Date;
import java.util.Iterator;

import javax.imageio.ImageIO;

import org.json.simple.JSONObject;


public class Main {

	public static void main(String[] args) {
		
		Api.init();
		JSONObject items = (JSONObject) allProfiles.getSpells().get("data");
		Iterator<?> keys = items.values().iterator();
		
		String[] ui = new String[]{"champion", "gold", "items", "minion", "score", "spells"};
		
		while(keys.hasNext()) {
	//	for(String s:ui) {	
			JSONObject key =  (JSONObject) keys.next();
			System.out.println(key.toJSONString());
//			String ending = (((JSONObject)(key.get("image"))).get("full").toString());
//			String link = "http://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/" + ending;
			
			
			String ending = (((JSONObject)(key.get("image"))).get("full").toString());
			String link = "http://ddragon.leagueoflegends.com/cdn/6.10.1/img/profileicon/" + ending;
			
			
//			String ending = (((JSONObject)(key.get("image"))).get("full").toString());
//			String link = "http://ddragon.leagueoflegends.com/cdn/6.9.1/img/item/" + ending;
			
//			String ending = (((JSONObject)(key.get("image"))).get("full").toString());
//			ending = s + ".png";
//			String link = "http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/" + ending;
			
			try(
				InputStream in = new URL(link).openStream()){
				Image image = ImageIO.read(in);
				BufferedImage bi = createResizedCopy(image, 32, 32, true);
				 ImageIO.write(bi, "png", new File("C:\\Users\\kevin_2\\Desktop\\profileicon\\" + ending));
			   // Files.copy(bi., Paths.get("C:\\Users\\kevin_2\\Desktop\\spells\\" + ending));
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			//System.exit(1);
		}
		

		
	}
	
	public static BufferedImage createResizedCopy(Image originalImage, int scaledWidth, int scaledHeight, boolean preserveAlpha) {
	    int imageType = preserveAlpha ? BufferedImage.TYPE_INT_RGB : BufferedImage.TYPE_INT_ARGB;
	    BufferedImage scaledBI = new BufferedImage(scaledWidth, scaledHeight, imageType);
	    Graphics2D g = scaledBI.createGraphics();
	    if (preserveAlpha) {
	        g.setComposite(AlphaComposite.Src);
	    }
	    g.drawImage(originalImage, 0, 0, scaledWidth, scaledHeight, null);
	    g.dispose();
	    return scaledBI;
	}
	
	
	public static void err(String s) {
		System.err.println("[" + (new Date()).toString() + "] " + s);
	}
	
	public static void log(String s) {
		System.out.println("[" + (new Date()).toString() + "] " + s);
	}
	
	public static void info(String s) {
		System.out.println("[" + (new Date()).toString() + "] INFO: " + s);
	}
	
	
}
