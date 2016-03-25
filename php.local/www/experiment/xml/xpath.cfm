<cfscript>
raw  = '<Response xmlns="http://example.com/ns/">
   <user>
      <dateOfBirth>1947-01-08</dateOfBirth>
      <email>sailor@example.com</email>
      <firstName>Ziggy</firstName>
      <lastName>Stardust</lastName>
      <gender>?</gender>
   </user>
</Response>';
xml = xmlParse(raw);
//writeDump(xml);

//usingLocalName = xml.search("/*[local-name()='Response']/*[local-name()='user']/*[local-name()='firstName']");
//writeDump(usingLocalName);

usingWildcardNamespace = xml.search("/*:Response/*:user/*:firstName");
writeDump(usingWildcardNamespace);
exit;
usingEmptyNamespace = xml.search("/:Response/:user/:gender");
writeDump(usingEmptyNamespace);
</cfscript>
