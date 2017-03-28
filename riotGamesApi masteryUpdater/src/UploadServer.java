import java.awt.Dimension;
import java.awt.Point;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

import javax.xml.transform.TransformerFactoryConfigurationError;

import org.w3c.dom.Element;

import com.clusterpoint.api.CPSConnection;
import com.clusterpoint.api.request.CPSLookupRequest;
import com.clusterpoint.api.request.CPSRetrieveRequest;
import com.clusterpoint.api.request.CPSUpdateRequest;
import com.clusterpoint.api.response.CPSListLastRetrieveFirstResponse;
import com.clusterpoint.api.response.CPSLookupResponse;
import com.clusterpoint.api.response.CPSModifyResponse;


public class UploadServer {

	private static CPSConnection conn1;
	private static CPSConnection conn2;
	private static CPSConnection conn3;
	private static CPSConnection conn4;
	
	public static void init() {
		 try {
			conn1 = new CPSConnection("tcps://cloud-us-0.clusterpoint.com:9008", "database", "user", "pass", "id");
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
//	public static void changeData(String id, int d1, int d2) throws TransformerFactoryConfigurationError, Exception {
//		 String doc = "<document><id>"+id+"</id><Correct>:"+d1+"</Correct><Incorrect>:"+d2+"</Incorrect></document>";
//		  CPSUpdateRequest update_req = new CPSUpdateRequest(doc);
//		  //CPSModifyResponse update_resp = (CPSModifyResponse) 
//		  conn.sendRequest(update_req);
//		  //System.out.println("Updated ids: " + Arrays.toString(update_resp.getModifiedIds()));
//	}
	
	public static void changeData(String[] tags, String[] vals, int num, String dataBase) throws TransformerFactoryConfigurationError, Exception {
		String doc = "<document>";
		for(int i = 0; i < num; i++) {
			doc = doc + "<" + tags[i].trim() +">:" +  vals[i].trim() + "</" + tags[i].trim() + ">";
		}
		doc = doc + "</document>";
		System.out.println(doc);
	    CPSUpdateRequest update_req = new CPSUpdateRequest(doc);
		switch(dataBase) {
		case  "riotgamesapi2016": conn1.sendRequest(update_req); break;
		}
	}
	
	public static String getData(String id) {
		  CPSRetrieveRequest retr_req = new CPSRetrieveRequest(id);
		  CPSListLastRetrieveFirstResponse retr_resp;
		try {
			retr_resp = (CPSListLastRetrieveFirstResponse) conn2.sendRequest(retr_req);
			List<Element> docs = retr_resp.getDocuments();
			Iterator<Element> it = docs.iterator();
			Element el = it.next();
			return el.getTextContent();
			//System.out.println();
			//String[] vals = val.split(":");
			
			//System.out.println(val + "     [" + vals[1].charAt(0) + "]    [" + vals[2].charAt(0) + "]");
			
			
		} catch (TransformerFactoryConfigurationError | Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			System.exit(1);
		}
		  
		  return null;
	}
	
	public static void lookup(String id) {
		//Set two ids to lookup
		  String ids[] = {id};
		  //Return just document id and title in found documents
		  Map<String, String> list = new HashMap<String, String>();
		  list.put("document/id", "yes");
		  list.put("document/title", "yes");
		  CPSLookupResponse resp = null;
		  CPSLookupRequest req;
		try {
			req = new CPSLookupRequest(ids, list);
			resp = (CPSLookupResponse) conn1.sendRequest(req);
			
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		 
		  System.out.println("Found " + resp.getFound());
		 
		  List<Element> docs = resp.getDocuments();
		  Iterator<Element> it = docs.iterator();
		  //Iterate through found documents
		  while (it.hasNext())
		  {
		    Element el = it.next();
		    System.out.println(el.getTextContent());
		    //Here goes code that extracts data from DOM Element
		  }
	}
	
	
}
