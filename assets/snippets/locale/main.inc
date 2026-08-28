<cms:set locale_common_file="locale/<cms:show k_lang/>.inc"/>
<cms:set locale_common="<cms:embed locale_common_file/>"/>
<cms:set locale_specific_file="locale/<cms:show k_lang/>_specific.inc"/>
<cms:set locale_specific="<cms:embed locale_specific_file/>"/>
<cms:set locale="<cms:concat '{' locale_common locale_specific '}' />" is_json='1' 'global'/>