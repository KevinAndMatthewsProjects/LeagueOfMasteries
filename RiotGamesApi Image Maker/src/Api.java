

import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.Iterator;

import javax.swing.JOptionPane;

import org.json.simple.*;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;
import org.jsoup.HttpStatusException;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;

public class Api {
	
	private static JSONParser parser;
	
	private static final String[] key = new String[]{"Keys"};
	private static int keyCounter = 0;
	public static String Region = "na";
	public static String Server = "NA1";
	private static final String Base = "https://" + Region + ".api.pvp.net";
	
	
	public static void init() {
		parser = new JSONParser();
		
	}
	
	public static String RegionToServer(String region) {
		if(region.toLowerCase().equals("na")) {
			return "NA1";
		} else if(region.toLowerCase().equals("eune")) {
			return "EUN1";
		} else if(region.toLowerCase().equals("euw")) {
			return "EUW1";
		} else {
			return region + "1";
		}
			
	}
	
	public static String getKey() {
		keyCounter++;
		if(keyCounter >= key.length) {
			keyCounter = 0;
		}
		return key[keyCounter];
	}

	public static int summonerIdByName(String name) {
		String html = getHtml(Base + "/api/lol/" + Region + "/v1.4/summoner/by-name/" + name + "?api_key=" + getKey());
		JSONObject json1 = getJson(html);
		String s = json1.get(name.toLowerCase()).toString();
		JSONObject json2 = getJson(s);
		return Integer.valueOf(String.valueOf(json2.get("id")));
	}
	
	public static JSONObject gameinfo(long summonerId) {
		String html = getHtml(Base + "/observer-mode/rest/consumer/getSpectatorGameInfo/" + Server + "/" + summonerId + "?api_key=" + getKey());
		//System.out.println(html);
		//https://na.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/NA1/50792611?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		if(html.equals("404")) {
			err(summonerId + " is not in game right now");
		}
		JSONObject json1 = getJson(html);
		//System.out.println(json1.toJSONString());
		return json1;
	}
	
	public static JSONObject getMatchHistory(long summonerId) {
		String html = getHtml(Base + "/api/lol/" + Region + "/v1.3/game/by-summoner/" + summonerId + "/recent?api_key=" + getKey());
		//https://na.api.pvp.net/api/lol/na/v1.3/game/by-summoner/50792611/recent?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		JSONObject json1 = getJson(html);
		return json1;
	}
	
	public static String[] getParticipant_info(JSONObject gameinfo, String info) {

		//return gameinfo.get("participants").toString();
		
		String[] ids = new String[10];
		int counter = 0;
		
		JSONArray msg = (JSONArray) gameinfo.get("participants");
		Iterator<JSONObject> iterator = msg.iterator();
		while (iterator.hasNext()) {
			String playerdata = iterator.next().toJSONString();
			ids[counter++] = getJson(playerdata).get(info).toString();
		}
		
		return ids;
	}
	
	public static long getMastery(long summonerId, long championId) {
		//https://na.api.pvp.net/championmastery/location/NA1/player/66109311/champion/1?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		String html = getHtml(Base + "/championmastery/location/" + Server +"/player/" + summonerId + "/champion/" + championId + "?api_key=" + getKey());
		JSONObject json =  getJson(html.toString());
		return (long) json.get("championPoints");
	}
	
	//https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=image&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
	
	public static JSONObject getAllItems() {
		String html = getHtml("https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=image&api_key=691c2e55-2706-4190-92c3-956f46f67ab7");
		System.out.println(html);
		return  getJson(html);
	}
	
	
	public static JSONObject getTopMastery(long summonerId, int amount) {
		String html = getHtml(Base + "/championmastery/location/" + Server + "/player/" + summonerId + "/topchampions?count=" + amount + "&api_key=" + getKey());
		//https://na.api.pvp.net/championmastery/location/na1/player/50792611/topchampions?count=3&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		return getJson("{\"mastery\": " + html + "}");
	}
	
	public static String[] getChallangerIds() {
		String html = getHtml(Base + "/api/lol/" + Region + "/v2.5/league/challenger?type=RANKED_SOLO_5x5&api_key=" + getKey());
		return getValuesFromJSONArray(getJson(html), "entries", "playerOrTeamId", -1);
	}
	
	public static String[] getMasterIds() {
		String html = getHtml(Base + "/api/lol/" + Region + "/v2.5/league/master?type=RANKED_SOLO_5x5&api_key=" + getKey());
		return getValuesFromJSONArray(getJson(html), "entries", "playerOrTeamId", -1);
	}
	
	
	public static String getHtml(String url) {
	        Document doc = null;
			try {
				doc = Jsoup.connect(url).maxBodySize(0).ignoreContentType(true).get();
				Thread.sleep(1);
			} catch (HttpStatusException e1) {
				
				if(e1.getStatusCode() == 429) {
					try {
						if(url.contains("#")) {
							err("1 minute sleep");
							Thread.sleep(60000);
						} else {
							err("7.5 second sleep");
							Thread.sleep(7500);
						}
						
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					
					return getHtml(url + "#");
					
				} else {
					err(e1.toString());
					return String.valueOf(e1.getStatusCode());
					
				} 
				
			} catch (IOException e) {
				System.err.println("There was an error connecting to the server");
				e.printStackTrace();
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			
			
			
			String body = doc.select("body").first().toString().split(">")[1].split("<")[0].trim();
			//System.out.println(doc.select("body"));
			if(body == null || body.equals("")) {
				System.err.println(url);
				System.err.println(doc);
			}
			return body;

	}
	
	public static JSONObject getRankedStats(long summonerId) {
		String html = getHtml(Base + "/api/lol/" + Region + "/v1.3/stats/by-summoner/" + summonerId + "/ranked?season=SEASON2016&api_key=" + getKey());
		//https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/50792611/ranked?season=SEASON2016&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		return getJson(html);
	}
	
	public static String[] getValuesFromJSONArray(JSONObject obj, String arrayLabel, String search, int amount) {
		if(amount != -1) {
		String[] ids = new String[amount];
		int counter = 0;
		
		JSONArray msg = (JSONArray) obj.get(arrayLabel);
		Iterator<JSONObject> iterator = msg.iterator();
		while (iterator.hasNext() && counter < amount) {
			String playerdata = iterator.next().toJSONString();
			ids[counter++] = getJson(playerdata).get(search).toString();
		}
		
		return ids;
		} else {
			ArrayList<String>ids = new ArrayList<String>();
			//int counter = 0;
			
			JSONArray msg = (JSONArray) obj.get(arrayLabel);
			Iterator<JSONObject> iterator = msg.iterator();
			while (iterator.hasNext()) {
				String playerdata = iterator.next().toJSONString();
				ids.add( getJson(playerdata).get(search).toString());
			}
			
			return ids.toArray(new String[ids.size()]);
		}
	}
	
	public static JSONObject getAllChampId() {
		
	String html = getHtml("https://na.api.pvp.net/api/lol/static-data/na/v1.2/champion?dataById=true&api_key=" + getKey());
			//https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/50792611/ranked?season=SEASON2016&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
	return (JSONObject) getJson(html).get("data");
	}
	
	public static JSONObject getLeague(long id) {
		String html = getHtml(Base + "/api/lol/" + Region+ "/v2.5/league/by-summoner/" + id + "/entry?season=SEASON2016&api_key=" + getKey());
		//https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/50792611/ranked?season=SEASON2016&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		return getJson(html);
		
	}
	
	public static JSONObject getJson(String json) {
		
		try {
			Object obj = parser.parse(json.toString());
			JSONObject jsonObject = (JSONObject) obj;
			return jsonObject;
		} catch (ParseException e) {
			System.out.println("[" + json + "]");
			e.printStackTrace();
		} 
		
		return null;

	}
	
	public static void err(String s) {
		System.err.println("[" + (new Date()).toString() + "] " + s);
	}
	
	public static void log(String s) {
		System.out.println("[" + (new Date()).toString() + "] " + s);
	}
	
	
}
