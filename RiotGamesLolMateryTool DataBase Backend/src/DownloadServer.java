import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

import javax.xml.transform.TransformerFactoryConfigurationError;

import org.w3c.dom.Element;

import com.clusterpoint.api.CPSConnection;
import com.clusterpoint.api.CPSTerm;
import com.clusterpoint.api.request.CPSRetrieveRequest;
import com.clusterpoint.api.request.CPSSearchRequest;
import com.clusterpoint.api.response.CPSListLastRetrieveFirstResponse;
import com.clusterpoint.api.response.CPSSearchResponse;
public class DownloadServer {

  
	private static CPSConnection conn;
	public static void init() {
		try {
			conn = new CPSConnection("tcps://cloud-us-0.clusterpoint.com:9008", "databaseName", "User", "Pass", "ID");
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	
	public static String[] getProblem(String id) throws Exception

  {//Retrieve single document specified by document id

	  try {
		  
  CPSRetrieveRequest retr_req = new CPSRetrieveRequest(id);
  CPSListLastRetrieveFirstResponse retr_resp = (CPSListLastRetrieveFirstResponse) conn.sendRequest(retr_req);
  
  List<Element> docs = retr_resp.getDocuments();
  Iterator<Element> it = docs.iterator();
  
    Element el = it.next();
    String[] vals = el.getTextContent().split(":");
    return vals;
	  } catch (java.net.ConnectException e) {
		  e.printStackTrace();
		  System.exit(1);
	  }
	return null;

  }
	public static List<Element> Search(String term, int offset, int docs,HashMap list) {

	String query = CPSTerm.get(term, "");

	CPSSearchRequest searchRequest = null;
	try {
		searchRequest = new CPSSearchRequest(query, offset, docs, list);
	} catch (Exception e1) {
		// TODO Auto-generated catch block
		e1.printStackTrace();
	}

	 
	CPSSearchResponse searchResponse = null;
	try {
		searchResponse = (CPSSearchResponse) conn.sendRequest(searchRequest);
	} catch (TransformerFactoryConfigurationError | Exception e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}

	if (searchResponse.getHits() > 0) {
		System.out.println("Found " + searchResponse.getHits() + " documents");
		System.out.println("showing from " + searchResponse.getFrom() + " to " + searchResponse.getTo());
	
		List<Element> results = searchResponse.getDocuments();
		
//		Iterator<Element> it = results.iterator();
//		ArrayList<String> results = new ArrayList<String>();
//		while (it.hasNext()) {
//			Element el = it.next();
//			System.out.println(el.getTextContent());
//	   }
		
		return results;
	}
	
	return null;
	
	}


}