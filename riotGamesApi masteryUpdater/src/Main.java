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
		
		allChampData = Api.getAllChampNames();
		
		try {
			CURRENT_PLAYER = Long.valueOf(DownloadServer.getProblem(":0")[3].trim());
			CURRENT_ID = Long.valueOf(DownloadServer.getProblem(":0")[4]);
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
	
//		<document>
//		<id>:999</id>
//		<champ>:</champ>
//	<league></league>
//	<SID></SID>
//	<MatchId></MatchId>
//	<region></region>
//	<mastery></mastery>
//	<role></role>
//	<data></data>
//	</document>
		
		for(int i=5;i<6;i++) {
			try {
				String[] data = DownloadServer.getProblem(":" + i);
				String id = (data[1]);
				String champ = data[2];
				String league = data[3];
				String SumId = data[4];
				String MatchId = data[5];
				String Region = data[6];
				String matchData = data[7];
				
				log(SumId);
				String queryName = champ.substring(0, 1).toUpperCase() + champ.substring(1).toLowerCase();
				log(queryName);
				String json = (allChampData.get(queryName).toString());
				String champId = (Api.getJson(json).get("id")).toString();
				
			//	System.exit(1);
				//String champId = "";
				String Mastery = String.valueOf(Api.getMastery(Long.valueOf(SumId), Long.valueOf(champId)));
				
				UploadServer.changeData(new String[] {"id","mastery", "champ", "league", "SID"
						, "MatchId",  "region", "data"}, new String[] {id,Mastery, champ, league
						, SumId, MatchId,  Region, matchData}, 8, "riotgamesapi");
				
			} catch (NumberFormatException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				continue;
			}
				
			
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
;
}
