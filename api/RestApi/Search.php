<?php
/*
 * HOMER API Engine
 *
 * Copyright (C) 2011-2015 Alexandr Dubovikov <alexandr.dubovikov@gmail.com>
 * Copyright (C) 2011-2015 Lorenzo Mangani <lorenzo.mangani@gmail.com> QXIP B.V.
 *
 * The Initial Developers of the Original Code are
 *
 * Alexandr Dubovikov <alexandr.dubovikov@gmail.com>
 * Lorenzo Mangani <lorenzo.mangani@gmail.com> QXIP B.V.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
*/

namespace RestApi;

function var_error_log( $object=null ){
    ob_start();                    // start buffer capture
    var_dump( $object );           // dump the values
    $contents = ob_get_contents(); // put the buffer into a variable
    ob_end_clean();                // end capture
    error_log( $contents );        // log contents of the result of var_dump( $object )
}

$isup_itu_cause_class = [
    0x00 => "normal event",
    0x01 => "normal event",
    0x02 => "resource unavailable",
    0x03 => "service or option not available",
    0x04 => "service or option not implemented",
    0x05 => "invalid message",
    0x06 => "protocol error",
    0x07 => "interworking",
];

$isup_cause_value = [
    1 =>	"Unallocated (unassigned) number",
    2 =>	"No route to specified transit network",
    3 =>	"No route to destination",
    4 =>	"Send special information tone",
    5 =>	"Misdialled trunk prefix",
    6 =>	"Channel unacceptable",
    7 =>	"Call awarded and being delivered in an established channel",
    8 =>	"Preemption",
    9 =>	"Preemption - circuit reserved for reuse",
    14 =>	"QoR: ported number", /* Add.1 */
    16 =>	"Normal call clearing",
    17 =>	"User busy",
    18 =>	"No user responding",
    19 =>	"No answer from user (user alerted)",
    20 =>	"Subscriber absent",
    21 =>	"Call rejected",
    22 =>	"Number changed",
    23 =>	"Redirection to new destination",
    24 =>	"Call rejected due to failure at the destination", /* Amd.1 */
    25 =>	"Exchange routing error",
    26 =>	"Non-selected user clearing",
    27 =>	"Destination out of order",
    28 =>	"Invalid number format (address incomplete)",
    29 =>	"Facility rejected",
    30 =>	"Response to STATUS ENQUIRY",
    31 =>	"Normal, unspecified",
    34 =>	"No circuit/channel available",
    38 =>	"Network out of order",
    39 =>	"Permanent frame mode connection out of service",
    40 =>	"Permanent frame mode connection operational",
    41 =>	"Temporary failure",
    42 =>	"Switching equipment congestion",
    43 =>	"Access information discarded",
    44 =>	"Requested circuit/channel not available",
    46 =>	"Precedence call blocked",
    47 =>	"Resource unavailable, unspecified",
    49 =>	"Quality of service not available",
    50 =>	"Requested facility not subscribed",
    53 =>	"Outgoing calls barred within CUG",
    55 =>	"Incoming calls barred within CUG",
    57 =>	"Bearer capability not authorized",
    58 =>	"Bearer capability not presently available",
    62 =>	"Inconsistency in designated outgoing access information and subscriber class",
    63 =>	"Service or option not available, unspecified",
    65 =>	"Bearer capability not implemented",
    66 =>	"Channel type not implemented",
    69 =>	"Requested facility not implemented",
    70 =>	"Only restricted digital information bearer capability is available",
    79 =>	"Service or option not implemented, unspecified",
    81 =>	"Invalid call reference value",
    82 =>	"Identified channel does not exist",
    83 =>	"A suspended call exists, but this call identity does not",
    84 =>	"Call identity in use",
    85 =>	"No call suspended",
    86 =>	"Call having the requested call identity has been cleared",
    87 =>	"User not member of CUG",
    88 =>	"Incompatible destination",
    90 =>	"Non-existent CUG",
    91 =>	"Invalid transit network selection",
    95 =>	"Invalid message, unspecified",
    96 =>	"Mandatory information element is missing",
    97 =>	"Message type non-existent or not implemented",
    98 =>	"Message not compatible with call state or message type non-existent or not implemented",
    99 =>	"Information element /parameter non-existent or not implemented",
    100 =>	"Invalid information element contents",
    101 =>	"Message not compatible with call state",
    102 =>	"Recovery on timer expiry",
    103 =>	"Parameter non-existent or not implemented, passed on",
    110 =>	"Message with unrecognized parameter, discarded",
    111 =>	"Protocol error, unspecified",
    127 =>	"Interworking, unspecified",
];

$isup_cause_std = [
    0x00 => "ITU-T",
    0x01 => "ISO/IEC",
    0x02 => "National",
    0x03 => "Specific",
];

$isup_cause_location = [
    0x0 => "user (U)",
    0x01 => "private network serving the local user (LPN)",
    0x02 => "public network serving the local user (LN)",
    0x03 => "transit network (TN)",
    0x04 => "public network serving the remote user (RLN)",
    0x05 => "private network serving the remote user (RPN)",
    0x07 => "international network (INTL)",
    0x0A => "network beyond interworking point (BI)",
];

$isup_event_info  = [
    0x01 => "ALERTING",
    0x02 => "PROGRESS",
    0x03 => "in-band",
    0x04 => "call forwarded on busy",
    0x05 => "call forwarded on no reply",
    0x06 => "call forwarded unconditional",
];

$isup_nai_vals  = [
    0x00 => "spare",
    0x01 => "subscriber number (national use)",
    0x02 => "unknown (national use)",
    0x03 => "national (significant) number",
    0x04 => "international number",
    0x05 => "network-specific number (national use)",
    0x06 => "network routing number in national (significant) number format (national use)",
    0x07 => "network routing number in network-specific number format (national use)",
    0x08 => "network routing number concatenated with Called Directory Number (national use)",
];

$isup_inn_vals  = [
    0x00 => "routing to internal network number allowed",
    0x01 => "routing to internal network number not allowed",
];

$isup_ni_vals  = [
    0x00 => "complete",
    0x01 => "incomplete",
];

$isup_npi_vals  = [
    0x00 => "spare",
    0x01 => "ISDN (Telephony) numbering plan (ITU-T Recommendation E.164)",
    0x02 => "spare",
    0x03 => "Data numbering plan (ITU-T Recommendation X.121) (national use)",
    0x04 => "Telex numbering plan (ITU-T Recommendation F.69) (national use)",
    0x05 => "reserved for national use",
    0x06 => "reserved for national use",
];

$isup_restrict_vals  = [
    0x00 => "presentation allowed",
    0x01 => "presentation restricted",
    0x02 => "address not available (Note 1) (national use)",
    0x03 => "reserved for restriction by the network",
];

$isup_screened_vals  = [
    0x00 =>	"reserved (Note 2)",
    0x01 => "user provided, verified and passed",
    0x02 => "reserved (Note 2)",
    0x03 => "network provided",
];

$isup_calling_cat_vals  = [
    0x00 => "calling party's category unknown at this time (national use)",
    0x01 => "operator, language French",
    0x02 => "operator, language English",
    0x03 => "operator, language German",
    0x04 => "operator, language Russian",
    0x05 => "operator, language Spanish",
    0x09 => "reserved (see ITU-T Recommendation Q.104) (Note) (national use)",
    0x0A => "ordinary calling subscriber",
    0x0B => "calling subscriber with priority",
    0x0C => "data call (voice band data)",
    0x0D => "test call",
    0x0E => "spare",
    0x0F => "payphone",
];

$isup_nci_sat_vals  = [
    0x00 => "no satellite circuit in the connection",
    0x01 => "one satellite circuit in the connection",
    0x02 => "two satellite circuits in the connection",
    0x03 => "spare",
];

$isup_nci_con_vals  = [
    0x00 => "continuity check not required",
    0x01 => "continuity check required on this circuit",
    0x02 => "continuity check performed on a previous circuit",
    0x03 => "spare",
];

$isup_nci_echo_vals  = [
    0x00 => "outgoing echo control device not included",
    0x01 => "outgoing echo control device included",
];

// Forward call indicators National/international call indicator
$isup_fwc_nic_vals  = [
    0x00 => "call to be treated as a national call",
    0x01 => "call to be treated as an international call",
];

// End-to-end method indicator
$isup_fwc_etem_vals  = [
    0x00 => "no end-to-end method available (only link-by-link method available)",
    0x01 => "pass-along method available (national use)",
    0x02 => "SCCP method available",
    0x03 => "pass-along and SCCP methods available (national use)",
];

// Interworking indicator
$isup_fwc_iw_vals  = [
    0x00 => "no interworking encountered (No. 7 signalling all the way)",
    0x01 => "interworking encountered",
];

// End-to-end information indicator
$isup_fwc_etei_vals  = [
    0x00 => "no end-to-end information available",
    0x01 => "end-to-end information available",
];

// ISDN user part indicator
$isup_fwc_isup_vals  = [
    0x00 => "ISDN user part not used all the way",
    0x01 => "ISDN user part used all the way",
];

// ISDN user part preference indicator
$isup_fwc_isup_pref_vals  = [
    0x00 => "ISDN user part preferred all the way",
    0x01 => "ISDN user part not required all the way",
    0x02 => "ISDN user part required all the way",
    0x03 => "spare",
];

// ISDN access indicator
$isup_fwc_ia_vals  = [
    0x00 => "originating access non-ISDN",
    0x01 => "originating access ISD",
];

// SCCP method indicator
$isup_fwc_sccpm_vals  = [
    0x00 => "no indication",
    0x01 => "connectionless method available (national use)",
    0x02 => "connection oriented method available",
    0x03 => "connectionless and connection oriented methods available (national use)",
];

// Transmission medium
$isup_trans_medium_vals  = [
    0x00 => "speech",
    0x01 => "spare",
    0x02 => "64 kbit/s unrestricted",
    0x03 => "3.1 kHz audio",
    0x04 => "reserved for alternate speech (service 2)/64 kbit/s unrestricted (service 1)",
    0x05 => "reserved for alternate 64 kbit/s unrestricted (service 1)/speech (service 2)",
    0x06 => "64 kbit/s preferred",
    0x07 => "2 × 64 kbit/s unrestricted",
    0x08 => "384 kbit/s unrestricted",
    0x09 => "1536 kbit/s unrestricted",
    0x0A => "1920 kbit/s unrestricted",
    0x10 => "3 × 64 kbit/s unrestricted",
    0x11 => "4 × 64 kbit/s unrestricted",
    0x12 => "5 × 64 kbit/s unrestricted",
    0x13 => "spare",
    0x14 => "7 × 64 kbit/s unrestricted",
    0x15 => "8 × 64 kbit/s unrestricted",
    0x16 => "9 × 64 kbit/s unrestricted",
    0x17 => "10 × 64 kbit/s unrestricted",
    0x18 => "11 × 64 kbit/s unrestricted",
    0x19 => "12 × 64 kbit/s unrestricted",
    0x1A => "13 × 64 kbit/s unrestricted",
    0x1B => "14 × 64 kbit/s unrestricted",
    0x1C => "15 × 64 kbit/s unrestricted",
    0x1D => "16 × 64 kbit/s unrestricted",
    0x1E => "17 × 64 kbit/s unrestricted",
    0x1F => "18 × 64 kbit/s unrestricted",
    0x20 => "19 × 64 kbit/s unrestricted",
    0x21 => "20 × 64 kbit/s unrestricted",
    0x22 => "21 × 64 kbit/s unrestricted",
    0x23 => "22 × 64 kbit/s unrestricted",
    0x24 => "23 × 64 kbit/s unrestricted",
    0x25 => "spare",
    0x26 => "25 × 64 kbit/s unrestricted",
    0x27 => "26 × 64 kbit/s unrestricted",
    0x28 => "27 × 64 kbit/s unrestricted",
    0x29 => "28 × 64 kbit/s unrestricted",
    0x2A => "29 × 64 kbit/s unrestricted",
];

// Q931 bearer capabilities
$q931_cstd_vals   = [
    0x00 => "ITU-T standardized coding as described below",
    0x01 => "ISO/IEC Standard",
    0x02 => "National standard",
    0x03 => "Standard defined for the network (either public or private) present on the network side of the interface",
];

$q931_trs_cap_vals  = [
    0x00 => "Speech",
    0x08 => "Unrestricted digital information",
    0x09 => "Restricted digital information",
    0x10 => "3.1 kHz audio",
    0x11 => "Unrestricted digital information with tones/announcements (Note 2)",
    0x18 => "Video",
];

$q931_trs_mde_vals  = [
    0x00 => "Circuit mode",
    0x01 => "Packet mode",
];

$q931_trs_rte_vals  = [
    0x00 => "packet-mode calls",
    0x10 => "64 kbit/s",
    0x11 => "2 × 64 kbit/s",
    0x13 => "384 kbit/s",
    0x15 => "1536 kbit/s",
    0x17 => "1920 kbit/s",
    0x18 => "Multirate (64 kbit/s base rate)",
];

$q931_usr_info_vals  = [
    0x00 => "ITU-T standardized rate adaption V.110, I.460 and X.30. This implies the presence of octet 5a and optionally octets 5b, 5c and 5d as defined below",
    0x02 => "G.711 u-law",
    0x03 => "G.711 a-law",
    0x04 => "G.721 ADPCM",
    0x05 => "H.221 and H.242",
    0x06 => "H.223 and H.245",
    0x07 => "Non-ITU-T standardized rate adaption",
    0x08 => "V.120",
    0x09 => "X.31",
];

class Search {

    protected $_instance = array();

    private $query_types;

    private $authmodule = true;
    
    function __construct()
    {
	$this->query_types = array("call", "registration", "isup", "rest");
	if(SYSLOG_ENABLE == 1) openlog("homerlog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
    }

    /**
    * Checks if a user is logged in.
    *
    * @return boolean
    */
    public function getLoggedIn(){

	$answer = array();

	if($this->authmodule == false) return $answer;

        if(!$this->getContainer('auth')->checkSession())
	{
		$answer['sid'] = session_id();
                $answer['auth'] = 'false';
                $answer['status'] = 403;
                $answer['message'] = 'bad session';
                $answer['data'] = array();
	}

	return $answer;
    }

    public function doSearchData($timestamp, $param){

	/* auth */
        if(count(($adata = $this->getLoggedIn()))) return $adata;

	$data = array();;

	$data = $this->doSearchMessagesData($timestamp, $param, false);

        $answer = array();

        if(empty($data)) {

                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }
        else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;


        $answer = array();

        if(empty($data)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;
    }
    
    
    public function doArchiveExportData($timestamp, $param){

	/* auth */
        if(count(($adata = $this->getLoggedIn()))) return $adata;

	$data = array();

	$return = $this->doExportMessagesData($timestamp, $param, false);

        $answer = array();

        if($return) {

                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }
        else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;


        $answer = array();

        if(empty($data)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;
    }
    
    public function doTransactionArchiveExportData($timestamp, $param){

	/* auth */
        if(count(($adata = $this->getLoggedIn()))) return $adata;

	$data = array();

	$return = $this->doExportTransactionMessagesData($timestamp, $param, false);

        $answer = array();

        if($return) {

                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }
        else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;


        $answer = array();

        if(empty($data)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;
    }


    public function getSearchData($raw_get_data){

	/* auth */
        if(count(($adata = $this->getLoggedIn()))) return $adata;
        
        /* get our DB */
        $db = $this->getContainer('db');
        
        /* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');

        $data = array();
        $lnodes = array();

        /* hack */
        $timestamp = $raw_get_data['timestamp'];
        $param = $raw_get_data['param'];

        if(isset($param['location'])) $lnodes = $param['location']['node'];
        
        $trans['call'] = getVar('call', false, $param["transaction"], 'bool');
        $trans['registration'] = getVar('registration', false, $param["transaction"], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param["transaction"], 'bool');
        
	/* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
		$trans['isup'] = false;
	}

        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = intval($time['from']/1000);
        $time['to_ts'] = intval($time['to']/1000);
        
        $and_or = getVar('orand', NULL, $param, 'string');
        $b2b = getVar('b2b', false, $param, 'bool');
        $uniq = getVar('uniq', false, $param, 'bool');
                
        $limit_orig = getVar('limit', 100, $param, 'int');
        if($limit_orig <= 0) $limit_orig = 100;
	
        $callwhere = array();
        if(count($callwhere)) $query .= " AND ( " .implode(" AND ", $callwhere). ")";

	$nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER, "name" => "single", "name" => "single");
        else {
            foreach($lnodes as $lnd) $nodes[] = $this->getNode($lnd['name']);
        }

        $layerHelper = array();
        $layerHelper['table'] = array();        
        $layerHelper['order'] = array();                
        $layerHelper['where'] = array();                    
        $layerHelper['fields'] = array();
        
        $layerHelper['time'] = $time;			                                       
        $layerHelper['where']['type'] = $and_or ? "OR" : "AND";                
        $layerHelper['where']['param'] = $callwhere;
        $layerHelper['fields']['msg'] = false;
	if($uniq) $layerHelper['fields']['md5msg'] = true;			      	

	$timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);

        foreach($nodes as $node) {
	    $db->dbconnect_node($node);
	    $limit = $limit_orig;

	    foreach($timearray as $tkey=>$tval) 
            {

		foreach($this->query_types as $query_type) {
		    if($trans[$query_type]) {
			if($limit < 1) break;

			    if ($query_type == 'isup') {
				$layerHelper['table']['base'] = "isup_capture";
				$layerHelper['table']['type'] = "all";
				$fields = ISUP_FIELDS_CAPTURE;
			    } else {
        			$layerHelper['table']['base'] = "sip_capture";
			        $layerHelper['table']['type'] = $query_type;
				$fields = FIELDS_CAPTURE;
			    }

			    $layerHelper['values'] = array();
			    $layerHelper['values'][] = $fields;
			    $layerHelper['values'][] = "'".$query_type."' as trans";
			    $layerHelper['values'][] = "'".$node['name']."' as dbnode";                                               
			    
			    $layerHelper['table']['timestamp'] = $tkey;
			    $layerHelper['order']['limit'] = $limit;			    
			    			    
			    $query = $layer->querySearchData($layerHelper);
			    $noderows = $db->loadObjectArray($query);
			    if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"get search data: ".$query);
			    $data = array_merge($data,$noderows);
			    $limit -= count($noderows);
		    }
		}
	    }
	}

        /* apply aliases */
        $this->applyAliases($data);
        
        if($uniq) {              
            $message = array();
            foreach($data as $key=>$row) 
            {
                if(isset($message[$row['md5sum']])) unset($data[$key]);
                else $message[$row['md5sum']] = $row['node'];
            }
        }
        

        /* sorting */
        usort($data, create_function('$a, $b', 'return $a["micro_ts"] > $b["micro_ts"] ? 1 : -1;'));

        $answer = array();

        if(empty($data)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        closelog();
        
        return $answer;
    }

    public function doSearchMessagesData($timestamp, $param, $full = false, $count = false){

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();


        
        /* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');
                     

        $data = array();
        $lnodes = array();

        $trans['call'] = getVar('call', false, $param['transaction'], 'bool');
        $trans['registration'] = getVar('registration', false, $param['transaction'], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param['transaction'], 'bool');

	/* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
		$trans['isup'] = false;
	}
	 
	if(isset($param['receive']) && isset($param['receive']['body']))
	{
             $full = getVar('body', false, $param['receive'], 'bool');             
        }

        if(isset($param['location'])) $lnodes = $param['location']['node'];
                
        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000);
        $time['to_ts'] = round($time['to']/1000);

        /* search fields */
        $search['from_user'] = getVar('from_user', NULL, $param['search'], 'string');
        $search['from_domain'] = getVar('from_domain', NULL, $param['search'], 'string');
        $search['to_user'] = getVar('to_user', NULL, $param['search'], 'string');
        $search['to_domain'] = getVar('to_domain', NULL, $param['search'], 'string');
        $search['ruri_user'] = getVar('ruri_user', NULL, $param['search'], 'string');
        $search['ruri'] = getVar('ruri', NULL, $param['search'], 'string');
        $search['ruri_domain'] = getVar('ruri_domain', NULL, $param['search'], 'string');
        $search['callid'] = getVar('callid', NULL, $param['search'], 'string');
        $search['callid_aleg'] = getVar('callid_aleg', NULL, $param['search'], 'string');
        $search['contact_user'] = getVar('contact_user', NULL, $param['search'], 'string');
        $search['pid_user'] = getVar('pid_user', NULL, $param['search'], 'string');
        $search['auth_user'] = getVar('auth_user', NULL, $param['search'], 'string');
        $search['user_agent'] = getVar('user_agent', NULL, $param['search'], 'string');
        $search['method'] = getVar('method', NULL, $param['search'], 'string');
        $search['cseq'] = getVar('cseq', NULL, $param['search'], 'string');
        $search['reason'] = getVar('reason', NULL, $param['search'], 'string');
        $search['msg'] = getVar('msg', NULL, $param['search'], 'string');
        $search['diversion'] = getVar('diversion', NULL, $param['search'], 'string');
        $search['via_1'] = getVar('via_1', NULL, $param['search'], 'string');
        $search['source_ip'] = getVar('source_ip', NULL, $param['search'], 'string');
        $search['source_port'] = getVar('source_port', NULL, $param['search'], 'string');
        $search['destination_ip'] = getVar('destination_ip', NULL, $param['search'], 'string');
        $search['destination_port'] = getVar('destination_port', NULL, $param['search'], 'string');
        $search['node'] = getVar('node', NULL, $param['search'], 'string');
        $search['proto'] = getVar('proto', NULL, $param['search'], 'string');
        $search['family'] = getVar('family', NULL, $param['search'], 'string');
        $search['custom_field1'] = getVar('custom_field1', NULL, $param['search'], 'string');
        $search['custom_field2'] = getVar('custom_field2', NULL, $param['search'], 'string'); 
        $search['custom_field2'] = getVar('custom_field3', NULL, $param['search'], 'string'); 

        $isup_search['calling_number'] = getVar('from_user', NULL, $param['search'], 'string');
        $isup_search['called_number'] = getVar('to_user', NULL, $param['search'], 'string');
        $isup_search['correlation_id'] = getVar('callid', NULL, $param['search'], 'string');
        $isup_search['source_ip'] = getVar('source_ip', NULL, $param['search'], 'string');
        $isup_search['source_port'] = getVar('source_port', NULL, $param['search'], 'string');
        $isup_search['destination_ip'] = getVar('destination_ip', NULL, $param['search'], 'string');
        $isup_search['destination_port'] = getVar('destination_port', NULL, $param['search'], 'string');
        $isup_search['node'] = getVar('node', NULL, $param['search'], 'string');
        $isup_search['proto'] = getVar('proto', NULL, $param['search'], 'string');
        $isup_search['family'] = getVar('family', NULL, $param['search'], 'string');


        $and_or = getVar('orand', NULL, $param['search'], 'string');
        $b2b = getVar('b2b', false, $param['search'], 'bool');
        $uniq = getVar('uniq', false, $param['search'], 'bool');
        #$limit_orig = getVar('limit', 100, $param, 'int');
        $limit_orig = getVar('limit', 100, $param['search'], 'int');
	if($limit_orig <= 0) $limit_orig = 100;
	
	$mapsCheck = array('from_user', 'to_user', 'ruri_user', 'pid_user');

	if(NORMALIZE_NUMBER == 1)
        {

                foreach($mapsCheck as $mpc=>$val) {
                        if($search[$val] != NULL)
                        {
                                $mapsFrom = array();
                                $k = $search[$val];
                                $mapsFrom[$k] = $k;
                                /* normal */
                                $m = preg_replace('/^0/', '+'.MY_COUNTRY_CODE, $k);
                                $mapsFrom[$m] = $m;
                                $m = preg_replace('/^0/', '00'.MY_COUNTRY_CODE, $k);
                                $mapsFrom[$m] = $m;
                                /* + */
                                $m = preg_replace('/^\+'.MY_COUNTRY_CODE.'/', '0', $k);
                                $mapsFrom[$m] = $m;
                                $m = preg_replace('/^\+/', '00', $k);
                                $mapsFrom[$m] = $m;
                                /* 00 */
                                $m = preg_replace('/^00'.MY_COUNTRY_CODE.'/', '0', $k);
                                $mapsFrom[$m] = $m;
                                $m = preg_replace('/^00/', '\+', $k);
                                $mapsFrom[$m] = $m;
                                //syslog(LOG_WARNING,"Search $mpc => $val: ".$search[$val]);
                                $search[$val] = implode(";",  array_keys($mapsFrom));
                        }
                }
        }

	//$search['correlation_id'] = implode(";",  array_keys($mapsCallid));	
	
        /* callid correlation */

        $callwhere = array();
        $callwhere = generateWhere($search, $and_or, $db, $b2b);
        $isup_callwhere = generateWhere($isup_search, $and_or, $db, $b2b);
        
        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER, "name" => "single");
        else {
            foreach($lnodes as $lnd) $nodes[] = $this->getNode($lnd['name']);
        }
        
        $layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();

        
        $layerHelper['where']['type'] = $and_or ? "OR" : "AND";
        $layerHelper['time'] = $time;                                        
        $layerHelper['fields']['msg'] = $full;
                

        
	$timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);        
	

        foreach($nodes as $node) {
	    $db->dbconnect_node($node);
	    $limit = $limit_orig;

	    foreach($timearray as $tkey=>$tval) {
		foreach($this->query_types as $query_type) {
		    if($trans[$query_type]) {
			if($limit < 1) break;

			if ($query_type == 'isup') {
				$layerHelper['table']['base'] = "isup_capture";
				$layerHelper['table']['type'] = "all";
        			$layerHelper['where']['param'] = $isup_callwhere;
				$fields = ISUP_FIELDS_CAPTURE;
			} else {
				$layerHelper['table']['base'] = "sip_capture";
				$layerHelper['table']['type'] = $query_type;
        			$layerHelper['where']['param'] = $callwhere;
				$fields = FIELDS_CAPTURE;
			}
			$layerHelper['table']['timestamp'] = $tkey;

			$layerHelper['values'] = array();
			
		        if(!$count)
		        {                         
		        	$layerHelper['values'][] = $fields;
		                $layerHelper['values'][] = "'".$query_type."' as trans";
		                $layerHelper['values'][] = "'".$node['name']."' as dbnode";
		                if($uniq) $layerHelper['fields']['md5msg'] = true;
			}
		        else {
		        	$layerHelper['values'][] = "count(*) as cnt";
		        	$layerHelper['group']['by'] = "msg";
			}

                        $layerHelper['order']['limit'] = $limit;                        

			$query = $layer->querySearchData($layerHelper);			
			$noderows = $db->loadObjectArray($query);
			if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"Search query: ".$query);
			$data = array_merge($data,$noderows);
			$limit -= count($noderows);
		    }
		}
            }
        }

        /* apply aliases */
        $this->applyAliases($data);
        
        if($uniq) {            
            $message = array();
            foreach($data as $key=>$row) 
            {
                if(isset($message[$row['md5sum']])) unset($data[$key]);
                else $message[$row['md5sum']] = $row['node'];
            }                    
        }

        if($count) {
            $cnt = 0;
            foreach($data as $key=>$row) 
            {
                $cnt+=$row[cnt];
            }                                 
            
            $data = array();
            $data["cnt"] = $cnt;
        }
        else {
            /* sorting */
            usort($data, create_function('$a, $b', 'return $a["micro_ts"] > $b["micro_ts"] ? 1 : -1;'));
        }

        if(SYSLOG_ENABLE == 1) closelog();        
        
        return $data;
    }
    
    public function doExportMessagesData($timestamp, $param, $full = false, $count = false){

        if(!defined('ARCHIVE_DATABASE')) return false;

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        /* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');
                     

        $data = array();
        $lnodes = array();

        $trans['call'] = getVar('call', false, $param['transaction'], 'bool');
        $trans['registration'] = getVar('registration', false, $param['transaction'], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param['transaction'], 'bool');

	/* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
		$trans['isup'] = false;
	}

        if(isset($param['location'])) $lnodes = $param['location']['node'];
                
        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000);
        $time['to_ts'] = round($time['to']/1000);

        /* search fields */
        $search['from_user'] = getVar('from_user', NULL, $param['search'], 'string');
        $search['from_domain'] = getVar('from_domain', NULL, $param['search'], 'string');
        $search['to_user'] = getVar('to_user', NULL, $param['search'], 'string');
        $search['to_domain'] = getVar('to_domain', NULL, $param['search'], 'string');
        $search['ruri'] = getVar('ruri', NULL, $param['search'], 'string');
        $search['ruri_user'] = getVar('ruri_user', NULL, $param['search'], 'string');
        $search['ruri_domain'] = getVar('ruri_domain', NULL, $param['search'], 'string');
        $search['callid'] = getVar('callid', NULL, $param['search'], 'string');
        $search['callid_aleg'] = getVar('callid_aleg', NULL, $param['search'], 'string');
        $search['contact_user'] = getVar('contact_user', NULL, $param['search'], 'string');
        $search['pid_user'] = getVar('pid_user', NULL, $param['search'], 'string');
        $search['auth_user'] = getVar('auth_user', NULL, $param['search'], 'string');
        $search['user_agent'] = getVar('user_agent', NULL, $param['search'], 'string');
        $search['method'] = getVar('method', NULL, $param['search'], 'string');
        $search['cseq'] = getVar('cseq', NULL, $param['search'], 'string');
        $search['reason'] = getVar('reason', NULL, $param['search'], 'string');
        $search['msg'] = getVar('msg', NULL, $param['search'], 'string');
        $search['diversion'] = getVar('diversion', NULL, $param['search'], 'string');
        $search['via_1'] = getVar('via_1', NULL, $param['search'], 'string');
        $search['source_ip'] = getVar('source_ip', NULL, $param['search'], 'string');
        $search['source_port'] = getVar('source_port', NULL, $param['search'], 'string');
        $search['destination_ip'] = getVar('destination_ip', NULL, $param['search'], 'string');
        $search['destination_port'] = getVar('destination_port', NULL, $param['search'], 'string');
        $search['node'] = getVar('node', NULL, $param['search'], 'string');
        $search['proto'] = getVar('proto', NULL, $param['search'], 'string');
        $search['family'] = getVar('family', NULL, $param['search'], 'string');
	$search['custom_field1'] = getVar('custom_field1', NULL, $param['search'], 'string');
        $search['custom_field2'] = getVar('custom_field2', NULL, $param['search'], 'string'); 
        $search['custom_field2'] = getVar('custom_field3', NULL, $param['search'], 'string'); 

        $isup_search['calling_number'] = getVar('from_user', NULL, $param['search'], 'string');
        $isup_search['called_number'] = getVar('to_user', NULL, $param['search'], 'string');
        $isup_search['correlation_id'] = getVar('callid', NULL, $param['search'], 'string');
        $isup_search['source_ip'] = getVar('source_ip', NULL, $param['search'], 'string');
        $isup_search['source_port'] = getVar('source_port', NULL, $param['search'], 'string');
        $isup_search['destination_ip'] = getVar('destination_ip', NULL, $param['search'], 'string');
        $isup_search['destination_port'] = getVar('destination_port', NULL, $param['search'], 'string');
        $isup_search['node'] = getVar('node', NULL, $param['search'], 'string');
        $isup_search['proto'] = getVar('proto', NULL, $param['search'], 'string');
        $isup_search['family'] = getVar('family', NULL, $param['search'], 'string');

        $and_or = getVar('orand', NULL, $param['search'], 'string');
        $b2b = getVar('b2b', false, $param['search'], 'bool');
        $uniq = getVar('uniq', false, $param['search'], 'bool');
        #$limit_orig = getVar('limit', 100, $param, 'int');
        $limit_orig = getVar('limit', 100, $param['search'], 'int');
	if($limit_orig <= 0) $limit_orig = 100;
	
        /* callid correlation */

        $callwhere = array();
        $callwhere = generateWhere($search, $and_or, $db, $b2b);
        $isup_callwhere = generateWhere($isup_search, $and_or, $db, $b2b);
        

        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER, "name" => "single");
        else {
            foreach($lnodes as $lnd) $nodes[] = $this->getNode($lnd['name']);
        }
        
        $layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();
        $layerHelper['values'] = array();
        $layerHelper['time'] = $time;                 
        
        $layerHelper['where']['type'] = $and_or ? "OR" : "AND";
        $layerHelper['table']['destination'] = array();
        $layerHelper['table']['destination']['db'] = ARCHIVE_DATABASE;                                                                                                        
                                                                                
	$timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);        

        foreach($nodes as $node) {
	    $db->dbconnect_node($node);
	    $limit = $limit_orig;

	    foreach($timearray as $tkey=>$tval) {
		foreach($this->query_types as $query_type) {
		    if($trans[$query_type]) {
			if($limit < 1) break;

			if($query_type == 'isup') {
				$layerHelper['table']['base'] = "isup_capture";
				$layerHelper['table']['type'] = "all";
        			$layerHelper['where']['param'] = $isup_callwhere;
				$fields = ISUP_FIELDS_CAPTURE;
			} else {
        			$fields = FIELDS_CAPTURE;
        			$layerHelper['table']['base'] = "sip_capture";
				$layerHelper['table']['type'] = $query_type;
        			$layerHelper['where']['param'] = $callwhere;
			}

        		if($full) $fields.=", msg ";
                        $layerHelper['table']['timestamp'] = $tkey;
                        $layerHelper['order']['limit'] = $limit;                        

        	        $query = $layer->queryInsertIntoData($layerHelper);
                        $db->executeQuery($query);
                        if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"do export data: ".$query);									
		    }
		}
            }
        }

        return true;
    }
    
    public function doExportTransactionMessagesData($timestamp, $param){

        if(!defined('ARCHIVE_DATABASE')) return false;

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

	/* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');
         

        $trans = array();
        $data = array();
        $lnodes = array();
        
        if(isset($param['location'])) $lnodes = $param['location']['node'];
                
        $trans['call'] = getVar('call', false, $param['transaction'], 'bool');
        $trans['registration'] = getVar('registration', false, $param['transaction'], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param['transaction'], 'bool');
        
	/* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
		$trans['isup'] = false;
	}

        $location = $param['location'];

        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000);
        $time['to_ts'] = round($time['to']/1000);
        
        //workaround for BYE click
        $time['from_ts'] -=600;

        $limit_orig = getVar('limit', 200, $param['search'], 'int');
        if($limit_orig <= 0) $limit_orig = 200;

        $record_id = getVar('id', 0, $param['search'], 'int');
        $callids = getVar('callid', array(), $param['search'], 'array');
        $b2b = getVar('b2b', true, $param['search'], 'bool');
        $uniq = getVar('uniq', false, $param['search'], 'bool');

        $callwhere = array();

        $utils['logic_or'] = getVar('logic', false, array_key_exists('query', $param) ? $param['query'] : array(), 'bool');
        $and_or = $utils['logic_or'] ? " OR " : " AND ";

        $search = array();
        /* make array */
        $search['callid'] = implode(";", $callids);
        $callwhere = generateWhere($search, $and_or, $db, $b2b);

        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER, "name" => "single");
        else {
            foreach($lnodes as $lnd) $nodes[] = $this->getNode($lnd['name']);
        }
	
	$timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);        

	$layerHelper = array();
	$layerHelper['table'] = array(); 
	$layerHelper['order'] = array(); 
	$layerHelper['where'] = array(); 
	$layerHelper['fields'] = array();
	$layerHelper['values'] = array();
	$layerHelper['time'] = $time;
	$layerHelper['table']['base'] = "sip_capture";
	$layerHelper['where']['type'] = $and_or ? "OR" : "AND";
	$layerHelper['where']['param'] = $callwhere;   
	$layerHelper['table']['destination'] = array();
	$layerHelper['table']['destination']['db'] = ARCHIVE_DATABASE;   

        foreach($nodes as $node)
        {
            $db->dbconnect_node($node);
            $limit = $limit_orig;
            $ts = $time['from_ts']; 

	    foreach($timearray as $tkey=>$tval) {

		foreach($this->query_types as $query_type) {
		    if($trans[$query_type]) {
			if($limit < 1) break;
			
			$layerHelper['table']['type'] = $query_type;
                        $layerHelper['table']['timestamp'] = $tkey;
                        $layerHelper['order']['limit'] = $limit;

                        $query = $layer->queryInsertIntoData($layerHelper);
                        $db->executeQuery($query);
                        if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"do export transaction data: ".$query);
		    }
		}
            }
        }

        return true;
    }
            

    public function doPcapExportData($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data = $this->doSearchMessagesData($timestamp, $param, true, false);

        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 0, date('Z'));

        sendFile(200, "OK", $pcapfile, $fsize, $buf);

        return;
    }

    public function doTextExportData($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data = $this->doSearchMessagesData($timestamp, $param, true);
        
	if(isset($param['timezone']) && isset($param['timezone']['value'])) {
                $val = getVar('value', 0, $param['timezone'], 'long');
                $offset = $val < -1 ? abs($val) : -$val;
                $offset *=60;                                            
        }
        else $offset = date('Z');  
                
        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 1, $offset);

        sendFile(200, "OK", $pcapfile, $fsize, $buf);

        return;
    }
    
    public function doCountExportData($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data = $this->doSearchMessagesData($timestamp, $param, true, true);
        
        return $data;        
    }
    
    public function doCloudExportData($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data = $this->doSearchMessagesData($timestamp, $param, true);

        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 0, date('Z'));
        
	$apishark = CLOUD_STORAGE_URI."/api/v1/".CLOUD_STORAGE_API."/upload";
	$pfile = PCAPDIR."/".$pcapfile;
	$fileHandle = fopen($pfile, 'w') or die("Error opening file");
	fwrite($fileHandle, $buf);
	fclose($fileHandle);
	
	$cfile = $this->getCurlValue($pfile,'application/cap', $pcapfile);	

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
	curl_setopt($ch, CURLOPT_URL, $apishark);
	curl_setopt($ch, CURLOPT_POST, true);

	$post = array("file" => $cfile);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$response = curl_exec($ch);

	unlink($pfile);
	
	$data = array();
	$json=json_decode($response,true);	
	if(array_key_exists('id', $json)) {
		$url = CLOUD_STORAGE_URI."/captures/".$json[id];
		$data["url"] = $url;
        }
        else if(array_key_exists('exceptions', $json)) {
		$url = CLOUD_STORAGE_URI."/captures/".$json[id];
		$data["exceptions"] = $json["exceptions"];
        }
        else {
            $data["exceptions"] = "unknown error";
        }
	
	curl_close($ch);        

        return $data;        
    }


    public function doSearchMethod($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;
        /* get our DB */

        $data = $this->getMessagesByMethod($timestamp, $param);
        
        while(list($i,$message)=each($data)){
        	
        	$new_message = '';
        	$isup_part = array();
        	
	    	if(preg_match('/multipart/i', $message['content_type'])){
	    		
				$d_message = $this->getMultipartMessage($message['msg'],$message['content_type']);
				$new_message = $d_message['headers']."\n\n";
				
				while(list($k,$part)=each($d_message['mime_parts'])){

					$new_message .= "--".$d_message['boundary']."\n";
					$new_message .= $part['header'];
					$new_message .= "\n\n";
					
					if(preg_match('/sdp/i', $part['header']))
						$new_message .= $part['body'];
					
					if(preg_match('/isup/i', $part['header'])){			
						$new_message .= $this->decodeIsupData($part['body'],'hex_decode');
						if(TSHARK_ENABLED == "1")
							$isup_part = $this->decodeIsupData($part['body'],'isup_decode');
					}
					
					$new_message .= "\n\n";
					
				}
				
				$new_message .= "--".$d_message['boundary']."--\n\n";
				
				if($isup_part)
					$new_message .= "pcap file: ".$isup_part['file']."\n".$isup_part['content'];

	    	} else if (preg_match('/isup/i', $message['content_type'])){ 
	    	
				$part = array();
				$lines = explode ( "\r\n\r\n", $message['msg'] );
	    		
				$part ['header'] = $lines [0];
				$part ['body'] = $lines [1];
	    		
				$new_message .= $part['header']."\n\n";    		
				$new_message .= $this->decodeIsupData($part['body'],'hex_decode');
				
				if(TSHARK_ENABLED == "1"){
					$isup_part = $this->decodeIsupData($part['body'],'isup_decode');
					$new_message .= "\n\npcap file: ".$isup_part['file']."\n\n".$isup_part['content'];
				}
	    		
        	} else {
	    		
	    		$new_message = $message['msg'];
	    		
	    	}
	    	
	    	$data[$i]['msg'] = $new_message;
	    	
		}

        $answer = array();

        if(empty($data)) {

                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;
    }



    public function getMessagesByMethod($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();        
        
	/* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');
         
        $data = array();

        $record_id = getVar('id', 0, $param['search'], 'int');
        $callid = getVar('callid', "", $param['search'], 'string');
        $trans['call'] = getVar('call', false, $param['transaction'], 'bool');
        $trans['registration'] = getVar('registration', false, $param['transaction'], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param['transaction'], 'bool');
        
        /* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
                $trans['isup'] = false;
	}

	$location = $param['location'];

        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000) - 300;
        $time['to_ts'] = round($time['to']/1000) + 300;

        $utils['logic_or'] = getVar('logic', false, array_key_exists('query', $param) ? $param['query'] : array(), 'bool');
        $and_or = $utils['logic_or'] ? " OR " : " AND ";

        $limit = 1;
        $search['id'] = $record_id;
        $callwhere = generateWhere($search, $and_or, $db, 0);


        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER);
        else {
            $nodes[] = $this->getNode($location['node']);
        }

        $timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);

        $layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();

        
        $layerHelper['time'] = $time;
        $layerHelper['fields']['msg'] = true;                        
        if($uniq) $layerHelper['fields']['md5msg'] = true;
        $layerHelper['where']['type'] = "AND";
        $layerHelper['where']['param'] = $callwhere;        


        foreach($nodes as $node) {
            $db->dbconnect_node($node);
            foreach($timearray as $tkey=>$tval) {
                foreach($this->query_types as $query_type) {
                    if($trans[$query_type]) {
                        if($limit < 1) break;

                        $layerHelper['values'] = array();
			if ($query_type == 'isup') {
				$layerHelper['table']['base'] = "isup_capture";
				$layerHelper['table']['type'] = "all";
                                $layerHelper['values'][] = ISUP_FIELDS_CAPTURE;
			} else {
				$layerHelper['table']['base'] = "sip_capture";
				$layerHelper['table']['type'] = $query_type;
                                $layerHelper['values'][] = FIELDS_CAPTURE;
			}
                        
                        $layerHelper['values'][] = "'".$query_type."' as trans";
                        $layerHelper['values'][] = "'".$node['name']."' as dbnode";
                        
                        $layerHelper['table']['timestamp'] = $tkey;
                        $layerHelper['order']['limit'] = $limit;
                        
                        $query = $layer->querySearchData($layerHelper);
                        $noderows = $db->loadObjectArray($query);

                        if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"method query: ".$query);
                        
                        $data = array_merge($data,$noderows);
                        $limit -= count($noderows);
                    }
                }
            }
        }

        /* apply aliases */
        $this->applyAliases($data);

        return $data;
    }

    public function getMessagesRTCByMethod($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

	/* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');         

        $data = array();

        $record_id = getVar('id', 0, $param['search'], 'int');
        $callid = getVar('callid', "", $param['search'], 'string');

	$location = $param['location'];

        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000) - 300;
        $time['to_ts'] = round($time['to']/1000) + 300;

        $utils['logic_or'] = getVar('logic', false, array_key_exists('query', $param) ? $param['query'] : array(), 'bool');
        $and_or = $utils['logic_or'] ? " OR " : " AND ";

        $limit = 1;
        $search['id'] = $record_id;
        $callwhere = generateWhere($search, $and_or, $db, 0);

        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER);
        else {
            $nodes[] = $this->getNode($location['node']);
        }

        $timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);

	$layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();


        $layerHelper['time'] = $time;                 
        $layerHelper['table']['base'] = "webrtc_capture";         
	$layerHelper['table']['notime'] = true;
        $layerHelper['where']['type'] = "AND";
        $layerHelper['where']['param'] = $callwhere;
        $layerHelper['fields']['msg'] = false;
	

	$layerHelper['fields']['ts'] = array();
	$layerHelper['fields']['ts'][0]=array();
	$layerHelper['fields']['ts'][0]['name'] = 'date';
	$layerHelper['fields']['ts'][0]['alias'] = 'unixts';


        foreach($nodes as $node) {
            $db->dbconnect_node($node);
            if($limit < 1) break;

	    $layerHelper['order']['limit'] = $limit;
	    	    
	    $layerHelper['values'] = array();
	    $layerHelper['values'][] = "*";
	    $layerHelper['values'][] = "'".$node['name']."' as dbnode";

	    $query = $layer->querySearchData($layerHelper);
            $noderows = $db->loadObjectArray($query);
            if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"get messages rtcp data: ".$query);
            $data = array_merge($data,$noderows);
            $limit -= count($noderows);            
        }
                
        /* apply aliases */
        $this->applyAliases($data);

        return $data;
    }


    public function doSearchMessage($timestamp, $param) {

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        /* get our DB */
        $db = $this->getContainer('db');

        $node = array( "dbname" =>  DB_HOMER);
        if(SINGLE_NODE == 1) $node = array( "dbname" =>  DB_HOMER);
        $db->dbconnect_node($node);

	/* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');         

        $data = array();
        $search = array();
        $callwhere = array();

        $trans['call'] = getVar('call', false, $param['transaction'], 'bool');
        $trans['registration'] = getVar('registration', false, $param['transaction'], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param['transaction'], 'bool');
        
	/* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
		$trans['isup'] = false;
	}

        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000);
        $time['to_ts'] = round($time['to']/1000);
        
        $limit = getVar('limit', 100, $param['search'], 'int');
        if($limit <= 0) $limit = 100;

        $record_id = getVar('id', 0, $param['search'], 'int');
        $search['callid'] = getVar('callid', "", $param['search'], 'string');
        $b2b = getVar('b2b', false, $param['search'], 'bool');

        $utils['logic_or'] = getVar('logic', false, array_key_exists('query', $param) ? $param['query'] : array(), 'bool');
        $and_or = $utils['logic_or'] ? " OR " : " AND ";

        $callwhere = generateWhere($search, $and_or, $db, $b2b);

        //if(count($callwhere)) $query .= " AND ( " .implode(" AND ", $callwhere). ")";

        $ts = $time['from_ts'];

	$layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();

        $layerHelper['time'] = $time;                 
        $layerHelper['table']['base'] = "sip_capture";         
        $layerHelper['where']['type'] = $and_or ? "OR" : "AND";
        $layerHelper['where']['param'] = $callwhere;
        $layerHelper['fields']['msg'] = true;


	$timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);

	 foreach($timearray as $tkey=>$tval) {

	    foreach($this->query_types as $query_type) {
		if($trans[$query_type]) {
			if($limit < 1) break;

		        $layerHelper['values'] = array();
		        $layerHelper['values'][] = FIELDS_CAPTURE;
		        $layerHelper['values'][] = "'".$query_type."' as trans";
		        $layerHelper['values'][] = "'".$node['name']."' as dbnode";
		        
			$layerHelper['table']['type'] = $query_type;
                        $layerHelper['table']['timestamp'] = $tkey;                
                        $layerHelper['order']['limit'] = $limit;   

                        $query = $layer->querySearchData($layerHelper);
                        $noderows = $db->loadObjectArray($query);
                        
                        if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"do search message data: ".$query);
                                                
			$data = array_merge($data,$noderows);
			$limit -= count($noderows);
		}
	    }
	}

        /* apply aliases */
        $this->applyAliases($data);

        /* sorting */
        usort($data, create_function('$a, $b', 'return $a["micro_ts"] > $b["micro_ts"] ? 1 : -1;'));

        $answer = array();

        if(empty($data)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }

        return $answer;
    }

    public function getMessagesForTransaction($timestamp, $param) {

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

	/* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');         

        $trans = array();
        $data = array();
        $lnodes = array();
        
        if(isset($param['location'])) $lnodes = $param['location']['node'];
                
        $trans['call'] = getVar('call', false, $param['transaction'], 'bool');
        $trans['registration'] = getVar('registration', false, $param['transaction'], 'bool');
        $trans['isup'] = getVar('isup', false, $param['transaction'], 'bool');
        $trans['rest'] = getVar('rest', false, $param['transaction'], 'bool');
        
	/* default transaction */
	if(!$trans['call'] && !$trans['registration'] && !$trans['rest'] && !$trans['isup']) {
		$trans['rest'] = true;
		$trans['registration'] = true;
		$trans['call'] = true;
		$trans['isup'] = false;
	}

        $location = $param['location'];

        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');
        $time['from_ts'] = floor($time['from']/1000);
        $time['to_ts'] = round($time['to']/1000);
        
        //workaround for BYE click
        $time['from_ts'] -=600;

        $limit_orig = getVar('limit', 200, $param['search'], 'int');
        if($limit_orig <= 0) $limit_orig = 200;

        $record_id = getVar('id', 0, $param['search'], 'int');
        $callids = getVar('callid', array(), $param['search'], 'array');
	$correlations = getVar('callid', array(), $param['search'], 'array');
        $b2b = getVar('b2b', true, $param['search'], 'bool');
        $uniq = getVar('uniq', false, $param['search'], 'bool');


        $utils['logic_or'] = getVar('logic', false, array_key_exists('query', $param) ? $param['query'] : array(), 'bool');
        $and_or = $utils['logic_or'] ? " OR " : " AND ";

        $search = array();
        /* make array */
        $search['callid'] = implode(";", $callids);
	$isup_search['correlation_id'] = implode(";", $correlations);
        $callwhere = array();
        $callwhere = generateWhere($search, $and_or, $db, $b2b);
	$isup_callwhere = generateWhere($isup_search, $and_or, $db, $b2b);

        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER, "name" => "single");
        else {
            foreach($lnodes as $lnd) $nodes[] = $this->getNode($lnd['name']);
        }
	
	$timearray = $this->getTimeArray($time['from_ts'], $time['to_ts']);        

	$layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();


        $layerHelper['time'] = $time;                 
        $layerHelper['where']['type'] = $and_or ? "OR" : "AND";
        $layerHelper['fields']['msg'] = true;
        if($uniq) $layerHelper['fields']['md5msg'] = true;


                                            
        foreach($nodes as $node)
        {
            $db->dbconnect_node($node);
            $limit = $limit_orig;
            $ts = $time['from_ts']; 

	    foreach($timearray as $tkey=>$tval) {

		foreach($this->query_types as $query_type) {
		    if($trans[$query_type]) {
			if($limit < 1) break;
			
			$layerHelper['values'] = array();
			if ($query_type == 'isup') {
				$layerHelper['table']['base'] = "isup_capture";
				$layerHelper['table']['type'] = "all";
        			$layerHelper['where']['param'] = $isup_callwhere;
                                $layerHelper['values'][] = ISUP_FIELDS_CAPTURE;
			} else {
        			$layerHelper['table']['base'] = "sip_capture";         
				$layerHelper['table']['type'] = $query_type;
        			$layerHelper['where']['param'] = $callwhere;
		        	$layerHelper['values'][] = FIELDS_CAPTURE;
			}

		        $layerHelper['values'][] = "'".$query_type."' as trans";
		        $layerHelper['values'][] = "'".$node['name']."' as dbnode";
		
                        $layerHelper['table']['timestamp'] = $tkey;                
                        $layerHelper['order']['limit'] = $limit;   

			$query = $layer->querySearchData($layerHelper);
			$noderows = $db->loadObjectArray($query);
			
			if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"get messages for transaction data: ".$query);
			
			$data = array_merge($data,$noderows);
			$limit -= count($noderows);
		    }
		}
            }
        }

        /* apply aliases */
        $this->applyAliases($data);
        
        if($uniq) {            
            $message = array();
            foreach($data as $key=>$row)
            {
                if(isset($message[$row['md5sum']])) unset($data[$key]);
                else $message[$row['md5sum']] = $row['node'];
            }
        }

        /* sorting */
        usort($data, create_function('$a, $b', 'return $a["micro_ts"] > $b["micro_ts"] ? 1 : -1;'));

        return $data;
    }

    public function getRTCForTransaction($timestamp, $param) {

        /* get our DB */
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        $data = array();
        $search = array();        
        $lnodes = array();
        $answer = array();  
        $callwhere = array();
        
         /* get our DB Abstract Layer */
         $layer = $this->getContainer('layer');
                 
        
        //if(array_key_exists('node', $param)) $lnodes = $param['node'];
        if(isset($param['location'])) $lnodes = $param['location']['node'];                
                                                  
        $time['from'] = getVar('from', round((microtime(true) - 300) * 1000), $timestamp, 'long');
        $time['to'] = getVar('to', round(microtime(true) * 1000), $timestamp, 'long');        
        $time['from_ts'] = floor($time['from']/1000);
        $time['to_ts'] = round($time['to']/1000);
        
        $time['from_ts']-=600;
        $time['to_ts']+=60;
        
        /* search fields */                
        $type = getVar('uniq', -1, $param['search'], 'int');                
        $node = getVar('node', NULL, $param['search'], 'string');
        $proto = getVar('proto', -1, $param['search'], 'int');
        $family = getVar('family', -1, $param['search'], 'int');
        $and_or = getVar('orand', NULL, $param['search'], 'string');        
        $limit_orig = getVar('limit', 100, $param, 'int');
        $callids = getVar('callid', array(), $param['search'], 'array');         
        
        $mapsCallid = array();

        $cn = count($callids);
        for($i=0; $i < $cn; $i++) {
                $mapsCallid[$callids[$i]] =  $callids[$i];

                if(BLEGCID == "b2b") {
                    $length = strlen(BLEGTAIL);
                    if(substr($callids[$i], -$length) == BLEGTAIL) {
                         $k = substr($callids[$i], 0, -$length);
                         $mapsCallid[$k] = $k;
                    }                
                    else {           
                         $k = $callids[$i].BLEGTAIL;
                         $mapsCallid[$k] = $k;
                    }
                     
                    $s = substr($k, 0, -1);
                    $mapsCallid[$s] =  $s; 
                }

                $k = substr($callids[$i], 0, -1);
                $mapsCallid[$k] =  $k;
        }


        $answer = array();

        if(empty($mapsCallid))
        {                     
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';     
                $answer['status'] = 200;      
                $answer['message'] = 'no data';
                $answer['data'] = $data;
                $answer['count'] = count($data);
                return $answer;                 
        }
                        
        $search['correlation_id'] = implode(";",  array_keys($mapsCallid));

        $nodes = array();
        if(SINGLE_NODE == 1) $nodes[] = array( "dbname" =>  DB_HOMER, "name" => "single");
        else {
            foreach($lnodes as $lnd) $nodes[] = $this->getNode($lnd['name']);
        }
	
	$layerHelper = array();
        $layerHelper['table'] = array();
        $layerHelper['order'] = array();
        $layerHelper['where'] = array();
        $layerHelper['fields'] = array();


        $layerHelper['time'] = $time;
        $layerHelper['table']['base'] = "webrtc_capture";
        $layerHelper['table']['notime'] = true;
        $layerHelper['where']['type'] = "AND";
        $layerHelper['where']['param'] = $callwhere;
        $layerHelper['fields']['msg'] = false;
        
        
        $layerHelper['fields']['ts'] = array();
        $layerHelper['fields']['ts'][0]=array();
        $layerHelper['fields']['ts'][0]['name'] = 'date';
        $layerHelper['fields']['ts'][0]['alias'] = 'unixts';
	$layerHelper['order']['limit'] = $limit;


        foreach($nodes as $node)
        {        
            
	    $db->dbconnect_node($node);                            
            $limit = $limit_orig;

            $layerHelper['values'] = array();
            $layerHelper['values'][] = "*";
            $layerHelper['values'][] = "'".$node['name']."' as dbnode";

            if(empty($callwhere)) $callwhere = generateWhere($search, $and_or, $db, 0);

	    $layerHelper['order']['limit'] = $limit;   
	    $layerHelper['where']['param'] = $callwhere;

	    $query = $layer->querySearchData($layerHelper);
            $noderows = $db->loadObjectArray($query);
            if(SYSLOG_ENABLE == 1) syslog(LOG_WARNING,"get rtcp for transaction data: ".$query);
            $data = array_merge($data,$noderows);                
            $limit -= count($noderows);            
        }
        
        /* sorting */
        usort($data, create_function('$a, $b', 'return $a["micro_ts"] > $b["micro_ts"] ? 1 : -1;'));

                
        if(empty($data)) {
        
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';             
                $answer['status'] = 200;                
                $answer['message'] = 'no data';                             
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }                
        else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';             
                $answer['message'] = 'ok';                             
                $answer['data'] = $data;
                $answer['count'] = count($data);
        }
        
        return $data;
    }



    public function doSearchTransaction($timestamp, $param) {
        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $answer = array();

        $hostcount = 0;
        $disconnect = 0;
        $inv_cseq = "";

        $hosts = array();
        $info = array();
        $uac = array();
        $min_ts = 0;
        $max_ts = 0;
        $statuscall = 1;
        $rtpinfo = array();
        $localdata = array();

        /* RTC call */
        $data =  $this->getRTCForTransaction($timestamp, $param);
        foreach($data as $row) {
                $localdata[] = $this->getRTCflow((object) $row, $hosts, $info, $uac, $hostcount, $rtpinfo, true);
                //if(!$min_ts) $min_ts = $row['micro_ts'];
        }

        $data =  $this->getMessagesForTransaction($timestamp, $param);
                    
        foreach($data as $row) {
                $localdata[] = $this->getSIPCflow((object) $row, $hosts, $info, $uac, $hostcount, $rtpinfo, false);
                if(!$min_ts) $min_ts = $row['micro_ts'];
        }
        
        //print_r($localdata);
        //exit;


        
        //print_r($data);
        //exit;

        usort($localdata, create_function('$a, $b', 'return $a["micro_ts"] > $b["micro_ts"] ? 1 : -1;'));
                

	if(!$max_ts) {
		$max_ts_tmp = end($data);
		$max_ts = $max_ts_tmp['micro_ts'];
	}
        //if(!$max_ts) $max_ts = end($data)['micro_ts'];

        /* calculate total duration if it set */

        $totdur = gmdate("H:i:s", intval(($max_ts - $min_ts) / 1000000));

	$info['totdur'] = $totdur;
	$info['statuscall'] = $statuscall;
	$info['callid'] = array();

	$reply['info']=$info;
	//$reply['hosts']=$hosts;
	$reply['hosts'] = $this->applyHostsAliases($hosts);
	$reply['uac']=$uac;
	$reply['rtpinfo']=$rtpinfo;
	$reply['calldata'] = $localdata;
	$reply['count'] = count($localdata);

        if(empty($localdata)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $reply;
                $answer['count'] = count($reply);
        } else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $reply;
                $answer['count'] = count($reply);
        }

        return $answer;
    }

    public function doSearchShareTransaction($param){

        $answer = array();
        $hostcount = 0;
        $disconnect = 0;
        $inv_cseq = "";
        $hosts = array();
        $info = array();
        $uac = array();
        $min_ts = 0;
        $max_ts = 0;
        $statuscall = 1;
        $rtpinfo = array();
        $localdata = array();

        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        $uuid = getVar('transaction_id', "", $param, 'string');

        $query = "SELECT data FROM link_share WHERE uuid='?' limit 1";
        $query  = $db->makeQuery($query, $uuid );
        $json = $db->loadObjectArray($query);

        if(!empty($json)) {

            $djson = json_decode($json[0]['data'], true);

            $timestamp = $djson['timestamp'];
            $param = $djson['param'];

            $data =  $this->getMessagesForTransaction($timestamp, $param);

            foreach($data as $row) {   
                    $localdata[] = $this->getSIPCflow((object) $row, $hosts, $info, $uac, $hostcount, $rtpinfo, SHARE_MESSAGES);
                    if(!$min_ts) $min_ts = $row['micro_ts'];
            }

	    if(!$max_ts) {
		$max_ts_tmp = end($data);
		$max_ts = $max_ts_tmp['micro_ts'];
	    }

            /* calculate total duration if it set */

            $totdur = gmdate("H:i:s", intval(($max_ts - $min_ts) / 1000000));

            $info['totdur'] = $totdur;
            $info['statuscall'] = $statuscall;
            $info['callid'] = array();
        }

	$reply['info']=$info;
	//$reply['hosts']=$hosts;
	$reply['hosts'] = $this->applyHostsAliases($hosts);
	$reply['uac']=$uac;
	$reply['rtpinfo']=$rtpinfo;
	$reply['calldata'] = $localdata;
	$reply['count'] = count($localdata);

	if(empty($localdata)) {
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['status'] = 200;
                $answer['message'] = 'no data';
                $answer['data'] = $reply;
                $answer['count'] = count($reply);
	} else {
                $answer['status'] = 200;
                $answer['sid'] = session_id();
                $answer['auth'] = 'true';
                $answer['message'] = 'ok';
                $answer['data'] = $reply;
                $answer['count'] = count($reply);
	}
	return $answer;
    }

    function getSIPCflow($data, &$hosts, &$info, &$uac, &$hostcount, &$rtpinfo, $message_include) {
		$calldata = array();
		$arrow_step=1;
		$host_step=1;

		$IPv6 = (strpos($data->source_ip, '::') === 0);

		// compress IPv6 addresses for UI
		if ($IPv6) {
		    $data->source_ip = inet_ntop(inet_pton($data->source_ip));
		    $data->destination_ip = inet_ntop(inet_pton($data->destination_ip));
		}

		if(preg_match('/[4-6][0-9][0-9]/',$data->method)) $statuscall = 1;
		else if($data->method == "CANCEL") $statuscall = 2;
		else if($data->method == "BYE") $statuscall = 3;
		else if($data->method == "200" && preg_match('/INVITE/',$data->cseq)) $statuscall = 4;
		else if(preg_match('/[3][0-9][0-9]/',$data->method)) $statuscall = 5;

		$calldata['id'] = $data->id;
		$calldata['protocol'] = "sip";
		$calldata['method'] = $data->method;
		$calldata['src_port'] = $data->source_port;
		$calldata['dst_port'] = $data->destination_port;
		$calldata['trans'] = $data->trans;
		$calldata['callid'] = $data->callid;
		$calldata['node'] = $data->node;
		$calldata['dbnode'] = $data->dbnode;
		$calldata['micro_ts'] = $data->micro_ts;
		$calldata['ruri_user'] = $data->ruri_user;
		if(!empty($data->source_alias)) { $calldata['source_alias'] = $data->source_alias;}
		if(!empty($data->destination_alias)) { $calldata['destination_alias'] = $data->destination_alias;}
		$calldata['source_ip'] = $data->source_ip;
		$calldata['destination_ip'] = $data->destination_ip;

		if($message_include) {
		    $calldata['msg'] = $data->msg;
		}

		if(!array_key_exists('callid', $info)) $info['callid'] = array();

		//array_push($info['callid'], $data->callid);
		if(!in_array($data->callid, $info['callid'])) {
		        array_push($info['callid'], $data->callid);
                }

		if (CFLOW_HPORT == true) {

                        $src_id = $data->source_ip.":".$data->source_port;
                        $dst_id = $data->destination_ip.":".$data->destination_port;

                        $src_id_complete = $data->source_ip.":".$data->source_port."-".$data->node;
                        $dst_id_complete = $data->destination_ip.":".$data->destination_port."-".$data->node;

                        if(!isset($hosts[$src_id_complete])) { $hosts[$src_id_complete] = $hostcount; $hostcount+=$host_step; }
                        if(!isset($hosts[$dst_id_complete])) { $hosts[$dst_id_complete] = $hostcount; $hostcount+=$host_step; }

		        $ssrc = ":".$data->source_port;

		} else {
		
		        $src_id = $data->source_ip;
		        $dst_id = $data->destination_ip;

		        if(!isset($hosts[$src_id])) { $hosts[$src_id] = $hostcount; $hostcount+=$host_step;}
		        if(!isset($hosts[$dst_id])) { $hosts[$dst_id] = $hostcount; $hostcount+=$host_step;}

		        $ssrc = "";
		}

		$calldata['src_id'] = $src_id;
		$calldata['dst_id'] = $dst_id;

		/* RTP INFO */
		if(preg_match('/=/',$data->rtp_stat)) {

			$tmparray = array();
			$newArray = array();

			if(substr_count($data->rtp_stat, ";") > substr_count($data->rtp_stat, ",")) $tmparray = preg_split('/\;/', $data->rtp_stat);
			else $tmparray = preg_split('/\,/', $data->rtp_stat);

			$newArray = array();
			$newArray['method']=$data->method;
			$newArray['id']=$data->id;
			$newArray['callid']=$data->callid;
			$newArray['date']=$data->date;
			$newArray['source'] = $data->source_ip.":".$data->source_port;

                        $reportArray = array();
			foreach ($tmparray as $lineNum => $line) {
				list($key, $value) = explode("=", $line);
			        $reportArray[$key] = $value;
			}
	        	
			$newArray['report'] = $reportArray;

			$rtpinfo[] = $newArray;
		}

		// SIP SWITCHES

		if(preg_match('/asterisk/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "asterisk", "agent" => $data->user_agent);
		}
		else if(preg_match('/FreeSWITCH/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "freeswitch", "agent" => $data->user_agent);
		}
		else if(preg_match('/kamailio|openser|opensip|sip-router/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "openser", "agent" => $data->user_agent);
		}
		else if(preg_match('/softx/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "sipgateway", "agent" => $data->user_agent);
		}
		else if(preg_match('/sipXecs/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "sipxecs", "agent" => $data->user_agent);
		}

		// SIP ENDPOINTS
		/*
 		  else if(preg_match('/Yealink SIP-T20P/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealinkt20', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Yealink SIP-T21P/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealinkt22', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Yealink SIP-T22P/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealinkt23', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Yealink SIP-T23P /i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealinkt26', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Yealink SIP-T26P/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealinkt28', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Yealink SIP-T28P/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealinkt52', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Grandstream GXP2130/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'grandstream2130', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Grandstream GXP2160/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'grandstream2160', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Grandstream HT702/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'grandstream702', 'agent' => $data->user_agent);  }
                  else if(preg_match('/snom300/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'snom300', 'agent' => $data->user_agent);  }
                  else if(preg_match('/snom320/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'snom320', 'agent' => $data->user_agent);  }
                  else if(preg_match('/snom710/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'snom710', 'agent' => $data->user_agent);  }
                  else if(preg_match('/snom720/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'snom720', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Aastra/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'aastra', 'agent' => $data->user_agent);  }
                  else if(preg_match('/AUDC/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'audiocodes', 'agent' => $data->user_agent);  }
                  else if(preg_match('/IP Office/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'Avaya', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Cisco/SPA/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'cisco', 'agent' => $data->user_agent);  }
                  else if(preg_match('/DLINK/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'dlink', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Fanvil C62/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'fanvil', 'agent' => $data->user_agent);  }
                  else if(preg_match('/FLYINGVOICE/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'grandstream', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Grandstream /i', $data->user_agent)) { $uac[$src_id] = array('image' => 'grandstream', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Linksys/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'linksys', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Polycom/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'polycom', 'agent' => $data->user_agent);  }
                  else if(preg_match('/snom/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'snom', 'agent' => $data->user_agent);  }
                  else if(preg_match('/THOMSON/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'thomson', 'agent' => $data->user_agent);  }
                  else if(preg_match('/MGW/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'voicentermgw', 'agent' => $data->user_agent);  }
                  else if(preg_match('/VoicenterSoftPhone/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'voicentersp', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Voip Phone/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'voipphone', 'agent' => $data->user_agent);  }
                  else if(preg_match('/X-Lite/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'xlite', 'agent' => $data->user_agent);  }
                  else if(preg_match('/eyeBeam/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'xlite', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Yealink/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealink', 'agent' => $data->user_agent);  }
                  else if(preg_match('/IP Phone SIP-T65P/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'yealink', 'agent' => $data->user_agent);  }
                  else if(preg_match('/didgw/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'didgw', 'agent' => $data->user_agent);  }
                  else if(preg_match('/proxy/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'proxy', 'agent' => $data->user_agent);  }
                  else if(preg_match('/Voicenter/i', $data->user_agent)) { $uac[$src_id] = array('image' => 'voicenterold', 'agent' => $data->user_agent);  }
		*/

		else if(preg_match('/x-lite|Bria|counter-path/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "counterpath", "agent" => $data->user_agent);
		}
		else if(preg_match('/WG4k/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "worldgate", "agent" => $data->user_agent);
		}
		else if(preg_match('/Eki/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "ekiga", "agent" => $data->user_agent);
		}
		else if(preg_match('/snom/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "snom", "agent" => $data->user_agent);
		}
		else {
		      $uac[$src_id] = array("image" => "sipgateway", "agent" => $data->user_agent);
		}

		//$timestamp = floor($data->micro_ts / 1000000);
		//$milliseconds = round( $data->micro_ts  - ($timestamp * 1000000) );
		//$tstamp =  date("Y-m-d H:i:s.".$milliseconds." T",$data->micro_ts / 1000000);
		$calldata['milli_ts'] = floor($data->micro_ts / 1000);
		$method_text = $data->method." ".$data->reply_reason;
		if(strlen($method_text) > 15) $method_text = substr($data->method." ".$data->reply_reason, 0, 22)."...";

		//SDP ?
		$val = "content_type";
		if(preg_match('/sdp/i', $data->content_type)) $method_text .= " (SDP) ";
		if(preg_match('/isup/i', $data->content_type)) {
			
			$part = array();
			$lines = explode ( "\r\n\r\n", $data->msg );
			
			$part ['header'] = $lines [0];
			$part ['body'] = $lines [1];
			
			$method = $this->decodeIsupData($part ['body'],'method_name');
			$method_text .= ' (ISUP'.( ($method)?'-'.$method:'' ).') ';
			
		}
		if(preg_match('/[0-9A-Za-z_-]/i', $data->auth_user)) $method_text .= " (AUTH)";
		if(preg_match('/multipart/i', $data->content_type)){
			
			$d_message = $this->getMultipartMessage($data->msg,$data->content_type);
			
			while(list($k,$part)=each($d_message['mime_parts'])){
				
				if(preg_match('/sdp/i', $part['header'])) $ctype_names[] = 'SDP';
				if(preg_match('/isup/i', $part['header'])) {
					
					
					$method = $this->decodeIsupData($part['body'],'method_name');
					$ctype_names[] = 'ISUP'.( ($method)?'-'.$method:'' );
					
				}
			}
			
			$method_text .= " (".implode('/',$ctype_names).")";
			
			
		}
		$calldata["method_text"] = $method_text;

		// MSG Temperature
		if(preg_match('/^40|50/', $method_text )) $msgcol = "red";
		else if(preg_match('/^30|SUBSCRIBE|OPTIONS|NOTIFY/', $method_text)) $msgcol = "purple";
		else if(preg_match('/^20/', $method_text)) $msgcol = "green";
		else if(preg_match('/^INVITE/', $method_text)) $msgcol = 'blue';
		else $msgcol = 'blue';
		$calldata["msg_color"] = $msgcol;

		/*IF */
		if($hosts[$src_id_complete] > $hosts[$dst_id_complete]) $calldata["destination"] = 2;
		else $calldata["destination"] = 1;

		return $calldata;
    }
    
    function getRTCflow($data, &$hosts, &$info, &$uac, &$hostcount, &$rtpinfo, $message_include) {
		$calldata = array();
		$arrow_step=1;
		$host_step=1;

		$msg = json_decode($data->msg);

		$IPv6 = (strpos($data->source_ip, '::') === 0);

		// compress IPv6 addresses for UI
		if ($IPv6) {
		    $data->source_ip = inet_ntop(inet_pton($data->source_ip));
		    $data->destination_ip = inet_ntop(inet_pton($data->destination_ip));
		}

		if($msg->method == "call.start") $statuscall = 1;
		else if($msg->method == "call.end") $statuscall = 3;
		else if($msg->method == "call.accept") $statuscall = 4;

		$calldata['id'] = $data->id;
		$calldata['protocol'] = "rtc";
		$calldata['method'] = $msg->method;
		$calldata['src_port'] = $data->source_port;
		$calldata['dst_port'] = $data->destination_port;
		$calldata['trans'] = "rtc";
		$calldata['callid'] = $data->correlation_id;
		$calldata['node'] = $data->node;
		$calldata['dbnode'] = $data->dbnode;
		$calldata['micro_ts'] = $data->micro_ts;
		$calldata['ruri_user'] = $msg->body->target;
		if(!empty($data->source_alias)) { $calldata['source_alias'] = $data->source_alias;}
		if(!empty($data->destination_alias)) { $calldata['destination_alias'] = $data->destination_alias;}
		$calldata['source_ip'] = $data->source_ip;
		$calldata['destination_ip'] = $data->destination_ip;

		if($message_include) {
		    $calldata['msg'] = $msg;
		}

		if(!array_key_exists('callid', $info)) $info['callid'] = array();

		//array_push($info['callid'], $data->callid);
		if(!in_array($data->callid, $info['callid'])) {
		        array_push($info['callid'], $data->callid);
                }

		if (CFLOW_HPORT == true) {

                        $src_id = $data->source_ip.":".$data->source_port;
                        $dst_id = $data->destination_ip.":".$data->destination_port;

		        if(!isset($hosts[$src_id])) { $hosts[$src_id] = $hostcount; $hostcount+=$host_step; }
		        if(!isset($hosts[$dst_id])) { $hosts[$dst_id] = $hostcount; $hostcount+=$host_step; }

		        $ssrc = ":".$data->source_port;

		} else {
		
		        $src_id = $data->source_ip;
		        $dst_id = $data->destination_ip;

		        if(!isset($hosts[$src_id])) { $hosts[$src_id] = $hostcount; $hostcount+=$host_step;}
		        if(!isset($hosts[$dst_id])) { $hosts[$dst_id] = $hostcount; $hostcount+=$host_step;}

		        $ssrc = "";
		}

		$calldata['src_id'] = $src_id;
		$calldata['dst_id'] = $dst_id;

		// SIP SWITCHES

		if(preg_match('/asterisk/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "asterisk", "agent" => $data->user_agent);
		}
		else if(preg_match('/FreeSWITCH/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "freeswitch", "agent" => $data->user_agent);
		}
		else if(preg_match('/kamailio|openser|opensip|sip-router/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "openser", "agent" => $data->user_agent);
		}
		else if(preg_match('/softx/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "sipgateway", "agent" => $data->user_agent);
		}
		else if(preg_match('/sipXecs/i', $data->user_agent)) {
		     $uac[$src_id] = array("image" => "sipxecs", "agent" => $data->user_agent);
		}

		//$timestamp = floor($data->micro_ts / 1000000);
		//$milliseconds = round( $data->micro_ts  - ($timestamp * 1000000) );
		//$tstamp =  date("Y-m-d H:i:s.".$milliseconds." T",$data->micro_ts / 1000000);
		$calldata['milli_ts'] = floor($data->micro_ts / 1000);
		$method_text = $msg->method;
		if(strlen($method_text) > 15) $method_text = substr($data->method." ".$data->reply_reason, 0, 22)."...";

		//SDP ?
		$val = "content_type";
		if(preg_match('/sdp/i', $data->content_type)) $method_text .= " (SDP) ";
		if(preg_match('/[0-9A-Za-z_-]/i', $data->auth_user)) $method_text .= " (AUTH)";
		$calldata["method_text"] = $method_text;

		// MSG Temperature
		if(preg_match('/^call.end/', $method_text )) $msgcol = "red";
		else if(preg_match('/^call.accept/', $method_text)) $msgcol = "green";
		else if(preg_match('/^call.ringing/', $method_text)) $msgcol = "purple";
		else if(preg_match('/^call.start/', $method_text)) $msgcol = 'blue';
		else $msgcol = 'black';
		
		$calldata["msg_color"] = $msgcol;

		/*IF */
		if($hosts[$src_id] > $hosts[$dst_id]) $calldata["destination"] = 2;
		else $calldata["destination"] = 1;

		return $calldata;
    }

    public function doPcapExport($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data =  $this->getMessagesForTransaction($timestamp, $param);

        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 0, date('Z'));

        sendFile(200, "OK", $pcapfile, $fsize, $buf);

        return;
    }

    public function doTextExport($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data =  $this->getMessagesForTransaction($timestamp, $param);
        
        if(isset($param['timezone']) && isset($param['timezone']['value'])) {
                $val = getVar('value', 0, $param['timezone'], 'long');
                $offset = $val < -1 ? abs($val) : -$val;                
                $offset *=60;                                                
        }
        else $offset = date('Z');                

        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 1, $offset);

        sendFile(200, "OK", $pcapfile, $fsize, $buf);

        return;
    }
    
    public function doCloudExport($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $data =  $this->getMessagesForTransaction($timestamp, $param);
        
        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 0, date('Z'));
        
	$apishark = CLOUD_STORAGE_URI."/api/v1/".CLOUD_STORAGE_API."/upload";
	$pfile = PCAPDIR."/".$pcapfile;
	$fileHandle = fopen($pfile, 'w') or die("Error opening file");
	fwrite($fileHandle, $buf);
	fclose($fileHandle);
	
	$cfile = $this->getCurlValue($pfile,'application/cap',$pcapfile);	

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
	curl_setopt($ch, CURLOPT_URL, $apishark);
	curl_setopt($ch, CURLOPT_POST, true);

	$post = array("file" => $cfile);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$response = curl_exec($ch);

	unlink($pfile);
	
	$data = array();
	$json=json_decode($response,true);	
	if(array_key_exists('id', $json)) {
		$url = CLOUD_STORAGE_URI."/captures/".$json[id];
		$data["url"] = $url;
        }
        else if(array_key_exists('exceptions', $json)) {
		$url = CLOUD_STORAGE_URI."/captures/".$json[id];
		$data["exceptions"] = $json["exceptions"];
        }
        else {
            $data["exceptions"] = "unknown error";
        }
	
	curl_close($ch);        
        
        return $data;
    }
    
    public function doPcapExportById($param){

        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        $uuid = getVar('transaction_id', "", $param, 'string');

        $query = "SELECT data FROM link_share WHERE uuid='?' limit 1";
        $query  = $db->makeQuery($query, $uuid );
        $json = $db->loadObjectArray($query);

        $djson = json_decode($json[0]['data'], true);

        $timestamp = $djson['timestamp'];
        $param = $djson['param'];

        $data =  $this->getMessagesForTransaction($timestamp, $param);

        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 0, date('Z'));

        sendFile(200, "OK", $pcapfile, $fsize, $buf);

        return;
    }

    public function doTextExportById($param){
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        $uuid = getVar('transaction_id', "", $param, 'string');

        $query = "SELECT data FROM link_share WHERE uuid='?' limit 1";
        $query  = $db->makeQuery($query, $uuid );
        $json = $db->loadObjectArray($query);

        $djson = json_decode($json[0]['data'], true);

        $timestamp = $djson['timestamp'];
        $param = $djson['param'];

        $data =  $this->getMessagesForTransaction($timestamp, $param);

	if(isset($param['timezone']) && isset($param['timezone']['value'])) {
                $val = getVar('value', 0, $param['timezone'], 'long');
                $offset = $val < -1 ? abs($val) : -$val;
                $offset *=60;                                            
        }
        else $offset = date('Z');  

        list($pcapfile, $fsize, $buf) = $this->generateHomerTextPCAP($data, 1, $offset);

        sendFile(200, "OK", $pcapfile, $fsize, $buf);

        return;
    }

    function generateHomerTextPCAP($results, $text, $offset) {

           if($text) {           
               $tz = timezone_name_from_abbr('', $offset, 1);
               if($tz === false) $tz = timezone_name_from_abbr('', $offset, 0);               
               if($tz === false) date_default_timezone_set(HOMER_TIMEZONE);
               else date_default_timezone_set($tz);                       
           }
           
           
           if(!count($results)) return array();

           /* GENERATE PCAP */
	   $size = array(
	         ethernet=>14,
	         ip => 20,
	         ip6 => 20,
	         udp => 8,
	         tcp => 20,
	         data => 0,
	         total => 0
           );
	
	   //Write PCAP HEADER
	   $pcaphdr = array(
	       magic => 2712847316,
	       version_major => 2,
	       version_minor => 4,
	       thiszone => 0,
	       sigfigs => 0,
	       snaplen => 102400,
	       network => 1
           );
	
	   $buf="";
	   $pcap_packet = pack("lssllll", $pcaphdr['magic'], $pcaphdr['version_major'], $pcaphdr['version_minor'], $pcaphdr['thiszone'], $pcaphdr['sigfigs'], $pcaphdr['snaplen'], $pcaphdr['network']);

	   //Ethernet header
	   $eth_hdr = array( dest_mac => "020202020202", src_mac => "010101010101", type => "0800");
	   $ethernet = pack("H12H12H4", $eth_hdr['dest_mac'], $eth_hdr['src_mac'], $eth_hdr['type']);

	   if(!$text) $buf=$pcap_packet;

	   foreach($results as $result) {

		$calldata = array();
		
		 $data=$result['msg'];
		 $size['data'] = strlen($data);
		 $ptk = '';

		 if($text) {

		     $sec = intval($result['micro_ts'] / 1000000);
		     $usec = $result['micro_ts'] - ($sec*1000000);

		     $buf .= "U ".date("Y/m/d H:i:s", $sec).".".$usec." ".date("O",$sec)." "
			  .$result['source_ip'].":".$result['source_port']." -> "
			  .$result['destination_ip'].":".$result['destination_port']."\r\n\r\n";
		     $buf.=$data."\r\n";

		} else {

		     //Ethernet + IP + UDP
		     $size['total'] = $size['ethernet'] + $size['ip'] + $size['udp'] + $size['data'];

		     //Pcap record
	    	     $pcaprec_hdr = array();
		     $pcaprec_hdr['ts_sec'] = intval($result['micro_ts'] / 1000000);  //4
		     $pcaprec_hdr['ts_usec'] = $result['micro_ts'] - ($pcaprec_hdr['ts_sec']*1000000); //4
		     $pcaprec_hdr['incl_len'] = $size['total']; //4
		     $pcaprec_hdr['orig_len'] = $size['total']; //4

		     $pcaprec_packet = pack("llll", $pcaprec_hdr['ts_sec'], $pcaprec_hdr['ts_usec'], $pcaprec_hdr['incl_len'], $pcaprec_hdr['orig_len']);
		     $buf.=$pcaprec_packet;

		     //ethernet header
		     $buf.=$ethernet;

		     //UDP
		     $udp_hdr = array();
		     $udp_hdr['src_port'] = $result['source_port'];
		     $udp_hdr['dst_port'] = $result['destination_port'];
		     $udp_hdr['length'] = $size['udp'] + $size['data'];
		     $udp_hdr['checksum'] = 0;

		     //Calculate UDP checksum
		     $pseudo = pack("nnnna*", $udp_hdr['src_port'],$udp_hdr['dst_port'], $udp_hdr['length'], $udp_hdr['checksum'], $data);
		     $udp_hdr['checksum'] = $this->pcapCheckSum($pseudo);

		      //IPHEADER
		     $ipv4_hdr = array();
		     $ip_ver = 4;
		     $ip_len = 5;
		     $ip_frag_flag = "010";
		     $ip_frag_oset = "0000000000000";
		     $ipv4_hdr['ver_len'] = $ip_ver . $ip_len;
		     $ipv4_hdr['tos'] = "00";
		     $ipv4_hdr['total_len'] = $size['ip'] + $size['udp'] + $size['data'];
		     $ipv4_hdr['ident'] = 19245;
		     $ipv4_hdr['fl_fr'] = 4000;
		     $ipv4_hdr['ttl'] = 30;
		     $ipv4_hdr['proto'] = 17;
		     $ipv4_hdr['checksum'] = 0;
		     $ipv4_hdr['src_ip'] = ip2long($result['source_ip']);
		     $ipv4_hdr['dst_ip'] = ip2long($result['destination_ip']);
		     $pseudo = pack('H2H2nnH4C2nNN', $ipv4_hdr['ver_len'],$ipv4_hdr['tos'],$ipv4_hdr['total_len'], $ipv4_hdr['ident'],
		           $ipv4_hdr['fl_fr'], $ipv4_hdr['ttl'],$ipv4_hdr['proto'],$ipv4_hdr['checksum'], $ipv4_hdr['src_ip'], $ipv4_hdr['dst_ip']);
		     $ipv4_hdr['checksum'] = $this->pcapCheckSum($pseudo);

		     $pkt = pack('H2H2nnH4C2nNNnnnna*', $ipv4_hdr['ver_len'],$ipv4_hdr['tos'],$ipv4_hdr['total_len'], $ipv4_hdr['ident'],
			$ipv4_hdr['fl_fr'], $ipv4_hdr['ttl'],$ipv4_hdr['proto'],$ipv4_hdr['checksum'], $ipv4_hdr['src_ip'], $ipv4_hdr['dst_ip'],
			$udp_hdr['src_port'],$udp_hdr['dst_port'], $udp_hdr['length'], $udp_hdr['checksum'], $data);
	        }

	        $buf.=$pkt;
	   }

	   $fileid = "sip_";
	   $fileid .= $result['callid'];
	   $pcapfile = "HOMER5_$fileid";
	   $pcapfile .= $text ? ".txt" : ".pcap";
	
           return array($pcapfile, strlen($buf), $buf);
    }


    public function doShareLink($timestamp, $param){

        if(count(($adata = $this->getLoggedIn()))) return $adata;

        $answer = array();

        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        /* get our DB Abstract Layer */
        $layer = $this->getContainer('layer');                 

        $uid = $_SESSION['uid'];

        $data['timestamp'] = $timestamp;
        $data['param'] = $param; 

	$uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
		        mt_rand( 0, 0xffff ), mt_rand( 0, 0x0fff ) | 0x4000, mt_rand( 0, 0x3fff ) | 0x8000,
		        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));

        $json = json_encode($data, true);
        
        $expire = $layer->getExpire("CURDATE()","+", "14","DAY");
        
        $query = "INSERT INTO link_share (uid, uuid, data, expire) values ('?','?','?',".$expire.");";
        $query  = $db->makeQuery($query, $uid, $uuid, $json );
        $db->executeQuery($query);

        $reply[0] = PUBLIC_SHARE_HOST."#".$uuid;

        $answer['status'] = 200;
        $answer['sid'] = session_id();
        $answer['auth'] = 'true';
        $answer['message'] = 'ok';
        $answer['data'] = $reply;
        $answer['count'] = 0;

        return $answer;
    }

    public function getNode($name){

        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();

        $table = "node";
        $query = "SELECT * FROM ".$table." WHERE name='?' AND status = 1 LIMIT 1";
	$query  = $db->makeQuery($query, $name);
        $data = $db->loadObjectArray($query);
	if(empty($data)) return array();
	return $data[0];
    }

    public function getContainer($name)
    {
        if (!$this->_instance || !isset($this->_instance[$name]) || $this->_instance[$name] === null) {
            //$config = \Config::factory('configs/config.ini', APPLICATION_ENV, 'auth');
            if($name == "auth") $containerClass = sprintf("Authentication\\".AUTHENTICATION);
            else if($name == "db") $containerClass = sprintf("Database\\".DATABASE_CONNECTOR);
            else if($name == "layer") $containerClass = sprintf("Database\\Layer\\".DATABASE_DRIVER);
            $this->_instance[$name] = new $containerClass();
        }
        return $this->_instance[$name];
    }

    /**
     * @param string $server
     * @url stats/([0-9]+)
     * @url stats
     * @return string
     */
    public function getStats($server = '1'){
        return $this->getServerStats($server);
    }


    public function pcapCheckSum($data) {

	if( strlen($data)%2 ) $data .= "\x00";
	$bit = unpack('n*', $data);
	$sum = array_sum($bit);
	while ($sum >> 16) $sum = ($sum >> 16) + ($sum & 0xffff);
	$sum = ~$sum;
	$sum = $sum & 0xffff;
	return $sum;

    }

    private function applyAliases(&$data) {

        // Load alias cache
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();
        $query = "SELECT ip, port, capture_id, alias FROM alias";
        $aliases = $db->loadObjectArray($query);
        foreach($aliases as $alias) {
            if($alias['capture_id'] == "*" || $alias['capture_id'] == "0" || $alias['capture_id'] == "") 
            {            
                if($alias['port'] == "0") $alias_cache[$alias['ip']] = $alias['alias'];                
                else $alias_cache[$alias['ip'].':'.$alias['port']] = $alias['alias'];                
            }            
            else if($alias['port'] == "0") $alias_cache[$alias['ip'].'-'.$alias['capture_id']] = $alias['alias'];            
            else $alias_cache[$alias['ip'].':'.$alias['port'].'-'.$alias['capture_id']] = $alias['alias'];
        }

        // Apply alias when an alias is configured
        for($i=0; $i < count($data); $i++) {

            // Apply source_alias
            if (isset($alias_cache[$data[$i]['source_ip'].':'.$data[$i]['source_port'].'-'.$data[$i]['node']])) {
                $data[$i]['source_alias'] = $alias_cache[$data[$i]['source_ip'].':'.$data[$i]['source_port'].'-'.$data[$i]['node']];
            } elseif (isset($alias_cache[$data[$i]['source_ip'].':'.$data[$i]['source_port']])) {
                $data[$i]['source_alias'] = $alias_cache[$data[$i]['source_ip'].':'.$data[$i]['source_port']];
            }
            elseif (isset($alias_cache[$data[$i]['source_ip'].'-'.$data[$i]['node']])) {
                $data[$i]['source_alias'] = $alias_cache[$data[$i]['source_ip'].'-'.$data[$i]['node'].':'];
            } 
            elseif (isset($alias_cache[$data[$i]['source_ip']])) {
                $data[$i]['source_alias'] = $alias_cache[$data[$i]['source_ip']];
            }           
            else {
                $data[$i]['source_alias'] = $data[$i]['source_ip'];
            }
            
            // Apply destination_alias
            if (isset($alias_cache[$data[$i]['destination_ip'].':'.$data[$i]['destination_port'].'-'.$data[$i]['node']])) {
                $data[$i]['destination_alias'] = $alias_cache[$data[$i]['destination_ip'].':'.$data[$i]['destination_port'].'-'.$data[$i]['node']];
            } elseif (isset($alias_cache[$data[$i]['destination_ip'].':'.$data[$i]['destination_port']])) {
                $data[$i]['destination_alias'] = $alias_cache[$data[$i]['destination_ip'].':'.$data[$i]['destination_port']];
            }
            elseif (isset($alias_cache[$data[$i]['destination_ip'].'-'.$data[$i]['node']])) {
                $data[$i]['destination_alias'] = $alias_cache[$data[$i]['destination_ip'].'-'.$data[$i]['node'].':'];
            } 
            elseif (isset($alias_cache[$data[$i]['destination_ip']])) {
                $data[$i]['destination_alias'] = $alias_cache[$data[$i]['destination_ip']];
            }           
            else {
                $data[$i]['destination_alias'] = $data[$i]['destination_ip'];
            }
        }
    }
    
    private function applyHostsAliases(&$data) {

        // Load alias cache
        $db = $this->getContainer('db');
        $db->select_db(DB_CONFIGURATION);
        $db->dbconnect();
        $query = "SELECT ip, port, capture_id, alias FROM alias";
        $aliases = $db->loadObjectArray($query);
        foreach($aliases as $alias) {
            if($alias['capture_id'] == "*" || $alias['capture_id'] == "0" || $alias['capture_id'] == "") 
            {            
                if($alias['port'] == "0") $alias_cache[$alias['ip']] = $alias['alias'];                
                else $alias_cache[$alias['ip'].':'.$alias['port']] = $alias['alias'];                
            }            
            else if($alias['port'] == "0") $alias_cache[$alias['ip'].'-'.$alias['capture_id']] = $alias['alias'];            
            else $alias_cache[$alias['ip'].':'.$alias['port'].'-'.$alias['capture_id']] = $alias['alias'];
        }

        $newhosts = array();

        $i = 0;
        // Apply alias when an alias is configured
        foreach($data as $key=>$value) {
            
            // Apply source_alias
            if (isset($alias_cache[$key])) $alias = $alias_cache[$key];
            else {
                if (preg_match('/(.*):(.*)-(.*)/', $key, $matches)) {
                    $key_ip_address = $matches[1];
                    $key_port = $matches[2];
                    $key_node = $matches[3];

                    if (isset($alias_cache[$key_ip_address . ":" . $key_port . "-" . $key_node])) {
                        $alias = $alias_cache[$key_ip_address . ":" . $key_port . "-" . $key_node];
                    }
                    else if (isset($alias_cache[$key_ip_address . ":" . $key_port . "-*"])) {
                        $alias = $alias_cache[$key_ip_address . ":" . $key_port . "-*"];
                    }
                    else if (isset($alias_cache[$key_ip_address . ":" . $key_port])) {
                        $alias = $alias_cache[$key_ip_address . ":" . $key_port];
                    }
                    else if (isset($alias_cache[$key_ip_address])) {
                        $alias = $alias_cache[$key_ip_address];
                    }
                    else {
                        $alias = $key_ip_address.":".$key_port;
                    }
                }
                // port was omitted in alias:
                else if (preg_match('/(.*)-(.*)/', $key, $matches)) {
                    $key_ip_address = $matches[1];
                    $key_node = $matches[2];
                    if (isset($alias_cache[$key_ip_address . "-" . $key_node])) {
                        $alias = $alias_cache[$key_ip_address . "-" . $key_node];
                    }
                    else if (isset($alias_cache[$key_ip_address . "-*"])) {
                        $alias = $alias_cache[$key_ip_address . "-*"];
                    }
                    else if (isset($alias_cache[$key_ip_address])) {
                        $alias = $alias_cache[$key_ip_address];
                    }
                    else {
                        $alias = $key_ip_address;
                    }
                }
                // extract IP address from $key:
                else if (preg_match('/(.*):.*/', $key, $matches)) {
                    $key_ip_address = $matches[1];
                    if (isset($alias_cache[$key_ip_address])) {
                        $alias = $alias_cache[$key_ip_address];
                    }
                    else $alias = $key;
                }
                else $alias = $key;
            }

            if(!isset($newhosts[$alias])) {
                $newhosts[$alias]['position'] = $i++;
            }
            
            $newhosts[$alias]['hosts'][] = array($key => $value);                        
        }
        
        return $newhosts;
    }
    
    // Helper function courtesy of https://github.com/guzzle/guzzle/blob/3a0787217e6c0246b457e637ddd33332efea1d2a/src/Guzzle/Http/Message/PostFile.php#L90
    function getCurlValue($filename, $contentType, $postname)
    {
    	// PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
	    // See: https://wiki.php.net/rfc/curl-file-upload
	    if (function_exists('curl_file_create')) {
        	return curl_file_create($filename, $contentType, $postname);
	    }
 
	    // Use the old style if using an older version of PHP
	    $value = "@".$filename.";filename=" . $postname;
	    if ($contentType) {
	        $value .= ';type=' . $contentType;
	    }
 
	    return $value;
   }
   
   
   function getTimeArray($from_ts, $to_ts) {
          
   	$timearray = array();
        $tkey = gmdate("Ymd", $to_ts);     
        $timearray[$tkey]=$tkey;                         

        for($ts = $from_ts; $ts <= $to_ts; $ts+=86400) {
                $tkey = gmdate("Ymd", $ts);
                $timearray[$tkey]=$tkey;                 
        }

   	return $timearray;
   }
    
	function decodeIsupPart($body) {
		$len = strlen ( $body );
		$isup_readable = '';
		
		for($j = 0; $j < $len; $j ++)
			
			$isup_readable .= sprintf ( "%02X ", ord ( $body [$j] ) );
			
			/* PCAP */
		$pcap_file = '/tmp/' . uniqid () . '.pcap';
		$fd = fopen ( $pcap_file, 'wb' );
		$pcap_headers_1 = array (
				'D4',
				'C3',
				'B2',
				'A1',
				'02',
				'00',
				'04',
				'00',
				'00',
				'00',
				'00',
				'00',
				'00',
				'00',
				'00',
				'00',
				'00',
				'90',
				'01',
				'00',
				'8C',
				'00',
				'00',
				'00',
				'64',
				'D1',
				'EB',
				'56',
				'78',
				'D4',
				'03',
				'00' 
		);
		
		while ( list ( $hpk, $hpv ) = each ( $pcap_headers_1 ) ) {
			fwrite ( $fd, chr ( hexdec ( $hpv ) ) );
		}
		
		$pcap_len = chr ( $len + 10 ) . chr ( 0 ) . chr ( 0 ) . chr ( 0 );
		fwrite ( $fd, $pcap_len . $pcap_len );
		
		$pcap_headers_2 = array (
				'DF',
				'A5',
				'3A',
				'85',
				'df',
				'cd',
				'0d',
				'33',
				'03',
				'00' 
		);
		while ( list ( $hpk, $hpv ) = each ( $pcap_headers_2 ) ) {
			fwrite ( $fd, chr ( hexdec ( $hpv ) ) );
		}
		fwrite ( $fd, $res ['body'] );
		fclose ( $fd );
		
		/* tskark */
		$command = TSHARK_PATH.' -V -r ' . $pcap_file . ' -O isup | '.EGREP.' \'^\s(.*)\'';
		$output = exec ( $command, $arr_output );
		
		$pcap_message = "\n\nfile: " . $pcap_file . "\n\n";
		$pcap_message .= implode ( "\r\n", $arr_output );
		$pcap_message .= "\n\n";
		
	}
   
	private function getMultipartMessage($msg,$content_type) {
		
		$boundary = $this->getBoundaryName($content_type);
		
		$matches = preg_split ( '/\-\-' . $boundary . '(--)?(\r\n)/', $msg );
		$retour = array();

		$retour['headers'] = trim($matches [0]);
		$retour['boundary'] = $boundary;
		
		$mime_parts = array();
		
		while ( list ( $key, $val ) = each ( $matches ) ) {
			
			if (preg_match ( '/^(Content\-Type: )(.*)/i', $val, $m )) {

				$mime_parts[] = $this->getMultipart($val);

			}
		}
		
		$retour['mime_parts'] = $mime_parts;
		return $retour;
		
	}
	
	private function getMultipart($part){
		
		$lines = explode ( "\r\n\r\n", $part );
		
		$res = array (
				'ctype' => $m[2],
				'header' => '',
				'body' => ''
		);
		
		$res ['header'] = $lines [0];
		$res ['body'] = substr ( $lines [1], 0, - 2 );
		
		return $res;
		
	}
	
	private function getBoundaryName($content_type){
		preg_match('/boundary\=(.*)/',$content_type,$matches);	
		return trim($matches[1],"\x00,\x09,\x0A,\x0B,\x0D,\x20,\x22");
	}
	
	private function decodeIsupData($isup,$type){
		
		$retour = null;
		$len = strlen($isup);
		$isup_method_name = array('01' => 'IAM','02' => 'SAM','03' => 'INR','04' => 'INF','06' => 'ACM','07' => 'CON','08' => 'FOT','09' => 'ANM','10' => 'RLC','12' => 'RSC','13' => 'BLO','14' => 'UBL','15' => 'BLA','16' => 'UBA','17' => 'GRS','18' => 'CGB','19' => 'CGU','20' => 'FAA','21' => 'FRJ','27' => 'DRS','28' => 'PAM','29' => 'GRA','30' => 'OLM','31' => 'CRG','32' => 'NRM','33' => 'FAC','34' => 'UPT','35' => 'UPA','36' => 'IDR','37' => 'IRS','38' => 'SGM','40' => 'LOP','41' => 'APM','42' => 'PRI','49' => 'CMC','0C' => 'REL','0D' => 'SUS','0E' => 'RES','1A' => 'CGBA','1B' => 'CGUA','1F' => 'FAR','2A' => 'CQM','2B' => 'CQR','2C' => 'CPG','2D' => 'USR','2E' => 'UCIC','2F' => 'CFN','4A' => 'CMRJ','4B' => 'CMR','E9' => 'CRA','EA' => 'CRM','EB' => 'CVR','EC' => 'CVT','ED' => 'EXM','FC' => 'CCL','FD' => 'MPM','FE' => 'OPR');
		
		switch($type){
		
			case 'isup_decode':
				
				$pcap_file = '/tmp/'.uniqid().'.pcap';
				$fd=fopen($pcap_file,'wb');
				$pcap_headers_1 = array('D4','C3','B2','A1','02','00','04','00','00','00','00','00','00','00','00','00','00','90','01','00','8C','00','00','00','64','D1','EB','56','78','D4','03','00');
				while(list($hpk,$hpv)=each($pcap_headers_1)){
					fwrite($fd,chr(hexdec($hpv)));
				}
					
				$pcap_len = chr($len+10).chr(0).chr(0).chr(0);
				fwrite($fd,$pcap_len.$pcap_len);
				
				$pcap_headers_2 = array('DF','A5','3A','85','df','cd','0d','33','03','00');
				while(list($hpk,$hpv)=each($pcap_headers_2)){
					fwrite($fd,chr(hexdec($hpv)));
				}
				fwrite($fd, $isup);
				fclose($fd);
					
				/* tskark */
				$command = TSHARK_PATH.' -V -r ' . $pcap_file . ' -O isup | '.EGREP.' \'^\s(.*)\'';
				$output = exec($command,$arr_output);
				array_shift($arr_output);
			
				$retour = array(
					'file' => $pcap_file,
					'content' => implode("\r\n",$arr_output)
				);
				
			break;
			
			case 'hex_decode':

				for ($j = 0; $j < $len; $j++)
					$retour .= sprintf("%02X ", ord($isup[$j]));
				
			break;
			
			case 'method_name':

				$hex_method = sprintf("%02X",ord( $isup[0] ));
				
				if(isset($isup_method_name[$hex_method]))
					$retour = $isup_method_name[$hex_method];			
				
			break;
				
		}
		
		return $retour;
		
	}
    
}

?>
