<?php
class unicodeReplaceEntities 
{
        public static function UTF8entities($content="") 
		{
            if($content == "") return "";
            $contents = unicodeReplaceEntities::unicode_string_to_array($content);
            $swap = "";
            $iCount = count($contents);
            for ($o=0;$o<$iCount;$o++) 
            {
                $contents[$o] = unicodeReplaceEntities::unicode_entity_replace($contents[$o]);
                $swap .= $contents[$o];
            }

            $swap = str_replace("'","&#39",$swap); // &#39
            //$swap = str_replace('"',"&quot;",$swap); // &#34

            return mb_convert_encoding($swap,"UTF-8"); //not really necessary, but why not.
        }

        public static function unicode_string_to_array( $string ) 
		{ 
            $strlen = mb_strlen($string);
            while ($strlen) {
                $array[] = mb_substr( $string, 0, 1, "UTF-8" );
                $string = mb_substr( $string, 1, $strlen, "UTF-8" );
                $strlen = mb_strlen( $string );
            }
            return $array;
        }

        public static function unicode_entity_replace($c) 
		{ 
            $h = ord($c{0});
            if ($h <= 0x7F) {
                return $c;
            } else if ($h < 0xC2) {
                return $c;
            }

            if ($h <= 0xDF) {
                $h = ($h & 0x1F) << 6 | (ord($c{1}) & 0x3F);
                $h = "&#" . $h . ";";
                return $h;
            } else if ($h <= 0xEF) {
                $h = ($h & 0x0F) << 12 | (ord($c{1}) & 0x3F) << 6 | (ord($c{2}) & 0x3F);
                $h = "&#" . $h . ";";
                return $h;
            } else if ($h <= 0xF4) {
                $h = ($h & 0x0F) << 18 | (ord($c{1}) & 0x3F) << 12 | (ord($c{2}) & 0x3F) << 6 | (ord($c{3}) & 0x3F);
                $h = "&#" . $h . ";";
                return $h;
            }
        }
    }
?>
