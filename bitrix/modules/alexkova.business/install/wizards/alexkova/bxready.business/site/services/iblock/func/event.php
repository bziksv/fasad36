<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) 
    die(); 


function createEventType($EVENT_NAME, $NAME, $LID, $DESCRIPTION){ 
    $et = new CEventType; 
    $et->Add(array( 
        "LID"           => $LID, 
        "EVENT_NAME"    => $EVENT_NAME, 
        "NAME"          => $NAME, 
        "DESCRIPTION"   => $DESCRIPTION 
    )); 
     
    return false; 
} 

function getEventType($ID, $LID){ 
    $rsET = CEventType::GetByID($ID, $LID); 
    $arET = $rsET->Fetch(); 
     
    if(!$arET) 
        return false; 

    return $arET; 
} 


function createEventMessage($EVENT_NAME, $LID, $SUBJECT, $MESSAGE){ 
    $arr["ACTIVE"] = "Y"; 
    $arr["EVENT_NAME"] = $EVENT_NAME; 
    $arr["LID"] = $LID; 
    $arr["EMAIL_FROM"] = "#DEFAULT_EMAIL_FROM#"; 
    $arr["EMAIL_TO"] = "#DEFAULT_EMAIL_FROM#"; 
    $arr["BCC"] = ""; 
    $arr["SUBJECT"] = $SUBJECT; 
    $arr["BODY_TYPE"] = "text"; 
    $arr["MESSAGE"] = $MESSAGE; 
    $emess = new CEventMessage; 
    $emess->Add($arr); 
    return false; 
} 

function getEventMessage($TYPE_ID, $LID){ 
     
    $arFilter = Array( 
        "TYPE_ID"       => $TYPE_ID, 
        "LID"           => $LID 
    ); 
     
    $rsMess = CEventMessage::GetList($by="site_id", $order="desc", $arFilter)->Fetch(); 
     
    if(!$rsMess) 
        return false; 

    return $rsMess; 
} 


?>