<?
class Template {
  var $strTemplateDir = './templates/';
  var $strBeginTag    = '{';
  var $strEndTag      = '}';
  var $arrVars        = array();
  var $arrValues      = array();
  var $stVars         = array('{RD}');
  var $stValues       = array('<span style="color: red;">*</span>');

  

function Teplate( $template_dir )
{
$this->strTemplateDir .= $template_dir;
}
  function assign( $strVar, $strValue='') {
    $this->arrVars[]   = $this->strBeginTag . $strVar  . $this->strEndTag;
    $this->arrValues[] = $strValue;
  }

  function display( $strFile ) {
    $resFile = @fopen( $this->strTemplateDir . '/' . $strFile, 'r' );
    $strBuff = @fread( $resFile, filesize( $this->strTemplateDir . '/' . $strFile ) );
    $strTest = @str_replace( $this->arrVars, $this->arrValues, $strBuff );
    $strTest = @str_replace( $this->stVars, $this->stValues, $strTest ); 
    $this->arrVars = array();
    $this->arrValues = array();
    return $strTest;
  }
}
?>
