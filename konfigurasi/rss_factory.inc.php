<?php     
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 

class RssFactory {

    // constructor
	function RssFactory() {}

    // rss generator
	function GenRssByData($aRssData, $sTitle, $sMainLink, $sImage = '') {
        $sRSSLast = '';
        if (isset($aRssData[0]))
            $sRSSLast = $aRssData[0]['DateTime'];

        $sUnitRSSFeed = '';
		foreach ($aRssData as $iUnitID => $aUnitInfo) {
			$sUnitUrl = $aUnitInfo['Link'];
			$sUnitGuid = $aUnitInfo['Guid'];
			$sUnitTitle = $aUnitInfo['Title'];
            $sUnitDate = $aUnitInfo['DateTime'];
			$sUnitDesc = $aUnitInfo['Desc'];

            $sUnitRSSFeed .= "<item><title><![CDATA[{$sUnitTitle}]]></title><link><![CDATA[{$sUnitUrl}]]></link><guid><![CDATA[{$sUnitGuid}]]></guid><description><![CDATA[{$sUnitDesc}]]></description><pubDate>{$sUnitDate}</pubDate></item>";
		}

		$sRSSTitle = "{$sTitle} RSS";
		$sRSSImage = ($sImage != '') ? "<image><url>{$sImage}</url><title>{$sRSSTitle}</title><link>{$sMainLink}</link></image>" : '';
        return "<?php  xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\"><channel><title>{$sRSSTitle}</title><link>{$sMainLink}</link><description>{$sRSSTitle}</description><lastBuildDate>{$sRSSLast}</lastBuildDate>{$sRSSImage}{$sUnitRSSFeed}</channel></rss>";
	}
}

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */

?>