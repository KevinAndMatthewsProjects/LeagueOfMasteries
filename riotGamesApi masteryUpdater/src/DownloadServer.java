import java.util.Iterator;
import java.util.List;

import org.w3c.dom.Element;

import com.clusterpoint.api.CPSConnection;
import com.clusterpoint.api.request.CPSRetrieveRequest;
import com.clusterpoint.api.response.CPSListLastRetrieveFirstResponse;
public class DownloadServer {

  
	private static CPSConnection conn;
	public static void init() {
		try {
			conn = new CPSConnection("tcps://cloud-us-0.clusterpoint.com:9008", "database", "user", "pass", "id");
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
  
  //while (it.hasNext()) {
  
    Element el = it.next();
   // System.out.println("[" + el.getTextContent() + "]");
    String[] vals = el.getTextContent().split(":");
   // System.out.println("[" + vals[3] + "]");
    return vals;
	  } catch (java.net.ConnectException e) {
		 // System.err.println("Could not connect, restarting");
		  //Text.main(null);
		  //System.exit(1);
		  e.printStackTrace();
		  System.exit(1);
	  }
	return null;

  }



}