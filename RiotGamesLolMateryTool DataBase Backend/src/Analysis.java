import java.awt.List;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

import javax.xml.transform.TransformerFactoryConfigurationError;

import org.json.simple.JSONObject;
import org.w3c.dom.Element;


public class Analysis {

	public static void Analysis() {
		JSONObject allItems = AllItems.getItems();
		JSONObject allChampData = Main.allChampData;
		 log(allChampData.toJSONString());
		 DecimalFormat df = new DecimalFormat("#.##");
		 Iterator<?> keys = allChampData.keySet().iterator();
		 Map<String, JSONObject> analysis = new HashMap<String, JSONObject>();
		 while( keys.hasNext() ) {
		     String key = (String)keys.next();
		     String name = Api.getJson(allChampData.get(key).toString()).get("name").toString();
		     log(name);
		     int games = 0;
		     try {
				java.util.List<Element> list = DownloadServer.Search(name, 0, 999, null);
				Iterator iterator = list.iterator();
				Map<String, Integer> items = new HashMap<String, Integer>();
				
				while (iterator.hasNext()) {
					try {
					String entry = ((Element) iterator.next()).getTextContent();
					String text = entry.split(":", 8)[7];
					
					JSONObject dataObj  = Api.getJson(text);
					for(int i=0;i<7;i++) {
						String itemId = "";
						try {
						itemId = Api.getJson(dataObj.get("stats").toString()).get("item" + i).toString();
						} catch(Exception e) {
							continue;
						}
						
							
							//System.out.println("Adding " + itemId);
							if(!items.containsKey(itemId)) {
								items.put(itemId, 0);
							}
							items.put(itemId, items.get(itemId) + 1);
							continue;

					}
					
					games++;
					} catch (Exception e) {
						continue;
					}
			   }
				ArrayList<String> Itemkeys = new ArrayList<String>(items.size());
				ArrayList<Integer> values = new ArrayList<Integer>(items.size());
				for(String s:items.keySet()) {
					Itemkeys.add(s);
					values.add(items.get(s));
				}
				
				boolean hasSwaped = false;
				
				int tempInt = 0;
				String tempString = "";
				
				do {
					try {
					hasSwaped = false;
					for(int counter = 0; counter < values.size() -1 ; counter++) {
					
					if(counter == values.size() - 1) {
						break;
					}
					if(values.get(counter) < values.get(counter + 1)) {
						tempString = Itemkeys.get(counter);
						tempInt = values.get(counter);
						Itemkeys.set(counter, Itemkeys.get(counter + 1));
						values.set(counter, values.get(counter + 1));
						Itemkeys.set(counter + 1, tempString);
						values.set(counter + 1, tempInt);
						hasSwaped = true;
					}
					
					}
					} catch (Exception e) {
						continue;
					}
				} while(hasSwaped) ;
			
				log("\n");
				for(int i=0;i<values.size();i++) {
					log(Itemkeys.get(i) + " " + values.get(i));
					if(i==10) {
					break;
					}
				}
			log("Total: " + games + "\n");
			
			JSONObject object = new JSONObject();
			Map<String, String> map = new HashMap<String, String>();
			
			for(int i=0;i<values.size();i++) {
			
				//map.put(Itemkeys.get(i), df.format(Double.valueOf(values.get(i))/(double)games));
				//System.out.println(Itemkeys.get(i) + " " + values.get(i));
				map.put(Itemkeys.get(i),df.format((double)values.get(i)/(double)games));
				if(i==10) {
				break;
				}
			}
			object.put("items", map);
			object.put("total", games);
			
			log(object.toJSONString());
			analysis.put(name, object);
			//System.exit(1);
				
				
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				continue;
			}
		 }
		 
		 JSONObject allAnalysis = new JSONObject();
		 allAnalysis.put("data", analysis);
		 log(allAnalysis.toJSONString());
		 
			try {
				UploadServer.changeDataWithoutBreak(new String[]{"id",  "champ", "league", "SID", "MatchId", "region", "data"}
				 , new String[]{"1", ":cmdExecuter", "", "", "", "",":" +  allAnalysis.toJSONString()}, 7, "riotgamesapi2016");
			} catch (TransformerFactoryConfigurationError | Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		 
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
