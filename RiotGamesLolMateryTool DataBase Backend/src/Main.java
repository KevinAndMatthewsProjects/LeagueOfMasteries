import java.util.ArrayList;
import java.util.Date;
import java.util.Iterator;

import javax.xml.transform.TransformerFactoryConfigurationError;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;


public class Main {
	
	private static final long PLAYER_RANGE1 = 607489;
	private static final long PLAYER_RANGE2 = 18976513;
	private static long PLAYER_RANGE_MIN = 1;
	private static final long PLAYER_COUNTER = 1;
	
	private static final int TOTAL_CHAMPS = 130;
	
	private static long CURRENT_PLAYER = 0;
	private static long CURRENT_ID = 2;
	
	private static final float MIN_KDA = 3.5f;
	
	public static JSONObject allChampData;
	
	public static void main(String[] args) {
		DownloadServer.init();
		UploadServer.init();
		Api.init();
		
		allChampData = Api.getAllChampId();
		
		Analysis.Analysis();
		
		System.exit(0);
		try {
			CURRENT_PLAYER = Long.valueOf(DownloadServer.getProblem(":0")[2].trim());
			CURRENT_ID = Long.valueOf(DownloadServer.getProblem(":0")[3].trim());
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		log("On Player: " + CURRENT_PLAYER);
		log("On ID " + CURRENT_ID);
	//	System.exit(0);
		//shadeslayer5 50792611
		//phammy 42760438
		//the worthy 35738804
		// thedarklegacy 47573219
		// youdieinvayne 56809506
		// jacieluv 66109311
		

		
		for(long i=CURRENT_PLAYER;i<i+1;i++) {
		
		ArrayList<String[]> data = null;
		try {
			//i = 200;
			if(i % 20 == 0) {
				log("Checking Server Commands");
//				for(String s:DownloadServer.getProblem("1")) {
//					log("[" + s + "]");
//				}
				String[] rowData = DownloadServer.getProblem("1");
				String cmds = rowData[1].trim();
				
				log(cmds);
				String p_Region = Api.Region;
				String p_Server = Api.Server;
				for(String s:cmds.split(";")) {
					try {
						String Sid = s.split("/")[0];
						String region = s.split("/")[1];
						Api.Region = region;
						Api.Server = Api.RegionToServer(region);

						data = checkChamp(Long.valueOf(Sid));
						uploadData(data, -1);
	
					} catch (Exception e) {
						//e.printStackTrace();
						continue;
					}
				}
				for(String s:rowData) {
					System.out.println(s);
				}
				System.out.println(rowData[rowData.length-1]);
				System.exit(1);
				UploadServer.changeDataWithoutBreak(new String[]{"id",  "champ", "league", "SID", "MatchId", "region", "data"}
				 , new String[]{"1", ":cmdExecuter", ":", ":", ":", ":", ":" + rowData[rowData.length-1].trim()}, 7, "riotgamesapi2016");
				Api.Region = p_Region;
				Api.Server = p_Server;
				
			} else if( i % 100000 == 0) {
				Analysis.Analysis();
			}
			Thread.sleep(1000);
			data = checkChamp(i);
		} catch ( java.net.SocketException e ) {
			DownloadServer.init();
			UploadServer.init();
			i--;
			continue;
		} catch (Exception e1) {
			//System.exit(1);
			//e1.printStackTrace();
			continue;
		}
		
		try {
			uploadData(data, i);
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		//System.exit(1);
		}
		
		
		
	}
	
	private static void uploadData(ArrayList<String[]> data,long id) throws Exception {
		if(data == null) {
			return;
		}
		for(String[] vals:data) { 
			try {
				UploadServer.changeData(new String[]{"id", "champ", "league", "SID", "MatchId","region" , "data"}
				, vals, 7, "riotgamesapi2016");
				if(id != -1) {
				UploadServer.changeData(new String[]{"id",  "champ", "league", "SID", "MatchId", "region", "data"}
				 , new String[]{"0", id+"", CURRENT_ID+"", "total", "", "", ""}, 7, "riotgamesapi2016");		
				} 
			} catch (TransformerFactoryConfigurationError e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
		}
	}
	
	private static ArrayList<String[]> checkChamp(long id) throws Exception{
		
		//get data on top 3 mastery champs
		log("Starting to get data on summoner id " + id);
		JSONObject obj = Api.getTopMastery(id, 3);
		String[] top3level = Api.getValuesFromJSONArray(obj, "mastery", "championLevel", 3);
		String[] top3points = Api.getValuesFromJSONArray(obj, "mastery", "championPoints", 3);
		String[] top3id = Api.getValuesFromJSONArray(obj, "mastery", "championId", 3);
		String[] top3time = Api.getValuesFromJSONArray(obj, "mastery", "lastPlayTime", 3);
		
		boolean[] hasS = new boolean[3];
		
		// check if top mastery champs are level 5
		

		
		if(top3id[0] == null && top3id[0] == null && top3id[0] == null) {
			log("No masteries present");
			throw new Exception();
		}
		
		log("checking if any are lvl 5");
		
		for(int i=0;i<3;i++) {
			if(top3level[i].equals("5")) {
				hasS[i] = true;
			} else {
				hasS[i] = false;
			}
		}
		
		log("checking time");
		
		for(int i=0;i<3;i++) {
			if(System.currentTimeMillis() - Long.valueOf(top3time[i]) < 6.048e+8) {
				hasS[i] = true;
			} else {
				hasS[i] = false;
			}
		}
		
		for(int i=0;i<3;i++) {
			
			if(!hasS[i]) {
				int days = (int) ((System.currentTimeMillis() - Long.valueOf(top3time[i])) / (1000*60*60*24));
				info("Champ id " + top3id[i] + " with level " + top3level[i] + " and last played " + days + 
						"days ago doesnt meet the requirements"
			);
			}
		}
		
		//return if none of mastery are 5 or not played recently
		if(!hasS[0] && !hasS[1]&& !hasS[2]) {
			err("No champs meet requirements");
			throw new Exception();
		}
		
		
		JSONObject stats = Api.getRankedStats(id);
		JSONArray champstats = (JSONArray) stats.get("champions");
		
		//log(champstats.toJSONString());
		
		Iterator<JSONObject> iterator = champstats.iterator();
		int[] avgPointPerMastery = new int[3];
		String[] gamesPlayed = new String[3];
		
		log("Starting calculate AvgPointsPerMaster");
		
		while (iterator.hasNext()) {
			JSONObject champstat = iterator.next();
		//	log(champstat.toJSONString());
		//	log(champstat.get("id").toString());
			for(int i=0;i<3;i++) {
			
		//	log(champstat.get("id") + " " + top3id[i] + " " + (Integer.valueOf(champstat.get("id").toString()) == Integer.valueOf(top3id[i])) + " "+ hasS[i]);	
				
			if(champstat.get("id").toString().contains(top3id[i]) && hasS[i]){
				gamesPlayed[i] = Api.getJson(champstat.get("stats").toString()).get("totalSessionsPlayed").toString();
				avgPointPerMastery[i] = (Integer.valueOf(top3points[i]) /
						Integer.valueOf(gamesPlayed[i]));
			}
			
			}
		}
		
		for(int i=0;i < 3;i++ ) {
			log("Champ Id: " + top3id[i] + " Points: " + top3points[i] + " GamesPlayed: " + gamesPlayed[i]
									+ " AvgPoints: " + avgPointPerMastery[i]);
			if(avgPointPerMastery[i] < 2000) {
				hasS[i] = false;
				log("Removed champ " + i + " with points " + avgPointPerMastery[i]);
			}
		}
		
		JSONArray gameHistory = (JSONArray)Api.getMatchHistory(id).get("games");
		Iterator<JSONObject> iterator1 = gameHistory.iterator();
		
		int arrayCounter = 0;
		
		ArrayList<String[]> data = new ArrayList<String[]>();
		
		while(iterator1.hasNext()) {
			JSONObject game = iterator1.next();
			String currentChampId = game.get("championId").toString();
			//log("checking champ " + currentChampId);
			if(!((currentChampId.equals(top3id[0]) && hasS[0]) || 
					(currentChampId.equals(top3id[1]) && hasS[1]) || 
					(currentChampId.equals(top3id[2]) && hasS[2]) )) {
			//	log(currentChampId + " doesnt match a valid mastery champ");
				continue;
			}
			
			if(!(game.get("subType").toString().equals("RANKED_SOLO_5x5") || game.get("subType").toString().equals("RANKED_PREMADE_5x5"))) {
				err("Gamemode " + game.get("subType") + " is not allowed");
				continue;
			}
			
			JSONObject currentStats = Api.getJson(game.get("stats").toString());
			
			float k,d,a,kda;
			
			try {
				k = Integer.valueOf(currentStats.get("championsKilled").toString());
			} catch (java.lang.NullPointerException e) {
				k = 0;
			}
			try {
				a = Integer.valueOf(currentStats.get("assists").toString());
			} catch (java.lang.NullPointerException e) {
				a = 0;
			}
			try {
				d = Integer.valueOf(currentStats.get("numDeaths").toString());
				kda = ((k + a)/d);
			} catch (java.lang.NullPointerException e) {
				kda = ((k + a)/1);
			}
			

			
			if(kda < MIN_KDA) {
				log("kda of " + kda + " on " + currentChampId + " is < " + MIN_KDA);
				continue;
			}
			
			String champId = game.get("championId").toString();
			String champName = "";
			try {
			champName = (String) ((JSONObject)(allChampData.get(champId))).get("name");
			} catch (Exception e) {
				e.printStackTrace();
				System.exit(1);
			}
			log(Api.getLeague(id).toJSONString());
			String statData = game.toJSONString();
			String tier = Api.getValuesFromJSONArray(Api.getLeague(id),""+id, "tier", 1)[0];
			String SID = String.valueOf(id);
			String MatchId = game.get("gameId").toString();
			
			String[] arrayData = new String[] {""+CURRENT_ID++, champName, tier, SID, MatchId, Api.Region, statData};
			data.add(arrayData);
			arrayCounter++;
		}
		
			
		return data;
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
;
}
