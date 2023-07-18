<html>
<head>
<title>LDAP Check</title>
<style type="text/css">
.inputclass {
    width: 1200px;
    height: 140px;
    top: 10px;
    left: 10px;
    position: absolute;

    text-align: center;
    vertical-align: middle;
    background-color: #FFFFFF;

    font-family: Georgia, serif;
    font-size: 16px;
    font-style: italic;
    font-variant: normal;
    font-weight: normal;

    box-shadow: 10px 10px 5px #888888;
    border: 2px solid #000000;

    -moz-border-radius-bottomleft: 14px;
    -webkit-border-bottom-left-radius: 14px;
    border-bottom-left-radius: 14px;

    -moz-border-radius-bottomright: 14px;
    -webkit-border-bottom-right-radius: 14px;
    border-bottom-right-radius: 14px;

    -moz-border-radius-topright: 14px;
    -webkit-border-top-right-radius: 14px;
    border-top-right-radius: 14px;

    -moz-border-radius-topleft: 14px;
    -webkit-border-top-left-radius: 14px;
    border-top-left-radius: 14px;
}

.outputclass {
    width: 1160px;
    height: 380px;
    top: 170px;
    left: 10px;
    position: absolute;
    overflow-y: auto;

    padding: 20px;
    text-align: left;
    vertical-align: middle;
    background-color: #FFFFFF;

    font-family: Book Antiqua;
    font-size: 14px;
    font-style: italic;
    font-variant: normal;
    font-weight: normal;

    box-shadow: 10px 10px 5px #888888;
    border: 2px solid #000000;

    -moz-border-radius-bottomleft: 14px;
    -webkit-border-bottom-left-radius: 14px;
    border-bottom-left-radius: 14px;

    -moz-border-radius-bottomright: 14px;
    -webkit-border-bottom-right-radius: 14px;
    border-bottom-right-radius: 14px;

    -moz-border-radius-topright: 14px;
    -webkit-border-top-right-radius: 14px;
    border-top-right-radius: 14px;

    -moz-border-radius-topleft: 14px;
    -webkit-border-top-left-radius: 14px;
    border-top-left-radius: 14px;
}

.hold {
    width: 1200px;
    height: 600px;
    margin-left: auto;
    margin-right: auto;
}

.contain {
    position: absolute;
    z-index: 0;
    background: transparent;
}

white.body {
    background-color: #FFFFFF;
}

blue.body {
    background-color: #66CCFF;
}

green.body {
    background-color: #D6EB99;
}

body {
    background-color: #E0E0E0;
}

form {
    width: 90%;
    height: 90%;
    background-color: #ffffff;
    vertical-align: middle;
    text-align: left;
    margin: auto;
    padding-top: 10;
}

label {
    display: inline-block;
    text-align: right;
    width: 120px;
}

select {
    padding: 2px 6px;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
    font-size: 16px;
    font-family: Georgia, serif;
    font-style: italic;
    font-variant: normal;
    font-weight: normal;
}

input {
    margin: 2px;
}

input[type=text] {
    width: 360px;
}

::file-selector-button {
  display: none;
}

.button {
    border-top: 1px solid #96d1f8;
    background: blue;
    background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
    background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
    background: -moz-linear-gradient(top, #3e779d, #65a9d7);
    background: -ms-linear-gradient(top, #3e779d, #65a9d7);
    background: -o-linear-gradient(top, #3e779d, #65a9d7);
    padding: 2px 6px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-shadow: rgba(0, 0, 0, 1) 0 1px 0;
    -moz-box-shadow: rgba(0, 0, 0, 1) 0 1px 0;
    box-shadow: rgba(0, 0, 0, 1) 0 1px 0;
    text-shadow: rgba(0, 0, 0, .4) 0 1px 0;
    color: white;
    font-size: 12px;
    font-family: Georgia, serif;
    text-decoration: none;
    vertical-align: middle;
}

.button:hover {
    border-top-color: #28597a;
    background: #28597a;
    color: #ccc;
}

.button:active {
    border-top-color: #1b435e;
    background: #1b435e;
}

pre {
    white-space: pre-line;
    padding: 5;
    border: 1px dotted black;
}
</style>

</head>

<body>

<?php
    if (isset($_POST['ldaphost'])) { $defaultHost = $_POST['ldaphost']; } else { $defaultHost = ""; }
    if (isset($_POST['ldapport'])) { $defaultPort = $_POST['ldapport']; } else { $defaultPort = ""; }
    if (isset($_POST['ldapuser'])) { $defaultUser = $_POST['ldapuser']; } else { $defaultUser = ""; }
    if (isset($_POST['ldappass'])) { $defaultPass = $_POST['ldappass']; } else { $defaultPass = ""; }
    if (isset($_POST['ssltype'])) { $defaultType = $_POST['ssltype']; } else { $defaultType = ""; }
    if (isset($_POST['verify'])) { $defaultVerify = $_POST['verify']; } else { $defaultVerify = ""; }
    if (isset($_POST['searchbase'])) { $defaultBase = $_POST['searchbase']; } else { $defaultBase = ""; }
    if (isset($_POST['ldapscope'])) { $defaultScope = $_POST['ldapscope']; } else { $defaultScope = ""; }
    if (isset($_POST['searchfilter'])) { $defaultFilter = $_POST['searchfilter']; } else { $defaultFilter = ""; }
    if (isset($_POST['returnattributes'])) { $defaultAttrs = $_POST['returnattributes']; } else { $defaultAttrs = ""; }

?>

<div class="hold">
<div class="contain">
<div class="inputclass">
<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<label>LDAP server :</label>
<input type="text" name="ldaphost" value="<?php echo $defaultHost; ?>" />
<label>LDAP port :</label>
<input type="text" name="ldapport" id="port" style="width:100px;" value="<?php echo $defaultPort; ?>" /><br />
<label>User name :</label>
<input type="text" name="ldapuser" value="<?php echo $defaultUser; ?>" />
<label>Password :</label>
<input type="password" name="ldappass" style="width:100px;" value="<?php echo $defaultPass; ?>" /><br />
<label>Search base :</label>
<input type="text" name="searchbase" value="<?php echo $defaultBase; ?>" />
<label>Scope :</label>
<select name="ldapscope">
<option value="sub" <?php if ($defaultScope == 'sub') { echo "selected"; } ?> >Sub</option>
<option value="one" <?php if ($defaultScope == 'one') { echo "selected"; } ?> >One</option>
<option value="base" <?php if ($defaultScope == 'base') { echo "selected"; } ?> >Base</option>
</select><br />
<label>Search filter :</label>
<input type="text" name="searchfilter" value="<?php echo $defaultFilter; ?>" />
<label>Attributes :</label>
<input type="text" name="returnattributes" style="width:100px;" value="<?php echo $defaultAttrs; ?>" /><br />
<label>Use SSL :</label>
<input type="radio" name="ssltype" value="ssl" onChange="sslChanged(value)" <?php if ($defaultType == 'ssl') { echo "checked"; } ?> />
<label>START_TLS :</label>
<input type="radio" name="ssltype" value="tls" onChange="sslChanged(value)" <?php if ($defaultType == 'tls') { echo "checked"; } ?> />
<label></label>
<?php
if (ini_get('file_uploads')) {
?>
<label class="button" for="upload" style="width:80px;" >Root Certificate</label>
<input type="hidden" name="MAX_FILE_SIZE" value="4096" />
<input id="upload" name="rootcert" type="file" style="width:200px;" accept="application/x-x509*"/>
<?php
}
?>
<label>Verify Certificate :</label>
<input type="checkbox" name="verify" <?php if ($defaultVerify == 'on') { echo "checked"; } ?>/>
<input type="submit" value=" Connect " class="button" />
</form>
</div>
<div class="outputclass">

<?php
// ini_set( 'display_errors', 1 );
// error_reporting( E_ALL );
function serviceping($host, $port=636, $timeout=3)
{
    echo "Pinging $host:$port <br />\n";
    $soc = fsockopen($host, $port, $errno, $errstr, $timeout);
    if (!$soc) {
        return false;
    }
    else {
        fclose($soc);
        return true;
    }
}

echo "Current PHP version: ".phpversion()."<br />\n";
if (!function_exists('ldap_connect')) {
    echo "PHP ldap extensions not found! <br />\n";
    exit(1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ldaphost'])) { $ldaphost = $_POST['ldaphost']; } else { $ldaphost = ""; }
    if (isset($_POST['ldapport'])) { $ldapport = $_POST['ldapport']; } else { $ldapport = ""; }
    if (isset($_POST['ldapuser'])) { $ldapuser = $_POST['ldapuser']; } else { $ldapuser = ""; }
    if (isset($_POST['ldappass'])) { $ldappass = $_POST['ldappass']; } else { $ldappass = ""; }
    if (isset($_POST['ssltype'])) { $ssltype = $_POST['ssltype']; } else { $ssltype = ""; }
    if (isset($_POST['verify'])) { $verify = $_POST['verify']; } else { $verify = ""; }
    if (isset($_POST['searchbase'])) { $ldapbase = $_POST['searchbase']; } else { $ldapbase = ""; }
    if (isset($_POST['ldapscope'])) { $ldapscope = $_POST['ldapscope']; } else { $ldapscope = ""; }
    if (isset($_POST['searchfilter'])) { $ldapfilter = $_POST['searchfilter']; } else { $ldapfilter = ""; }
    if (isset($_POST['returnattributes'])) { $ldapattrs = explode(',', $_POST['returnattributes']); } else { $ldapattrs = ""; }

    if (!serviceping($ldaphost, $ldapport)) {
        echo "Could not connect to port $ldapport on host $ldaphost! <br />\n";
        exit(1);
    }

    ldap_set_option(null, LDAP_OPT_TIMELIMIT, 5);
    ldap_set_option(null, LDAP_OPT_NETWORK_TIMEOUT, 5);
    ldap_set_option(null, LDAP_OPT_PROTOCOL_VERSION, 3);

    ldap_set_option(null, LDAP_OPT_DEBUG_LEVEL, 2);
    // define('LDAP_OPT_DIAGNOSTIC_MESSAGE', 0x0032);
    if (isset($_FILES["rootcert"]) && $_FILES["rootcert"]['error']==0) {
        echo "Using certificate ".$_FILES["rootcert"]["name"]."<br />\n";
        ldap_set_option(null, LDAP_OPT_X_TLS_CACERTFILE, $_FILES['rootcert']['tmp_name']);
    }
    else
    {
        ldap_set_option(null, LDAP_OPT_X_TLS_CACERTFILE, "");
    }
    ldap_set_option(null, LDAP_OPT_X_TLS_CACERTDIR, "/tmp");
    if ($verify == "on") {
        echo "Verifying Certificate<br />";
        ldap_set_option(null, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_HARD);
    }
    else
    {
        echo "Not Verifying Certificate<br />";
        ldap_set_option(null, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_NEVER);
    }

    if ($ssltype == "ssl") {
        $ldapurl = "ldaps://$ldaphost";
    }
    else
    {
        $ldapurl = "ldap://$ldaphost";
    }
    if ($ldapport) {
        $ldapurl = $ldapurl .":". $ldapport;
    }

    echo "Connecting to: $ldapurl<br />\n";

    $ldapconn = ldap_connect($ldapurl);
    if ($ldapconn) {
        if (ldap_get_option($ldapconn, LDAP_OPT_X_TLS_REQUIRE_CERT, $opt)) {
            echo "LDAP_OPT_X_TLS_REQUIRE_CERT: $opt<br />";
        }

        echo "Connect status: ".ldap_error($ldapconn)."<br />\n";

        echo "SSL Type: $ssltype<br />\n";
        if ($ssltype == "tls") {
            ldap_start_tls($ldapconn);
        }
        echo "<br />\n";
        if ($ldapuser) {
            echo "Binding as $ldapuser<br />\n";
            if (! $ldappass) { $ldappass = " ";
            }
            $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass);
        }
        else
        {
            echo "Binding as Anonymous<br />\n";
            $ldapbind = @ldap_bind($ldapconn);
        }
        echo "Bind status: ".ldap_error($ldapconn)."<br />\n";

        if (ldap_get_option($ldapconn, LDAP_OPT_HOST_NAME, $host_name)) {
            echo "LDAP_OPT_HOST_NAME: $host_name<br />";
        }

        if (ldap_get_option($ldapconn, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error)) {
            echo "LDAP_OPT_DIAGNOSTIC_MESSAGE: $extended_error<br />";
        }

        if ($ldapbind) {
            ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

            echo "<br />Searching for \"$ldapfilter\" in \"$ldapbase\", scope \"$ldapscope\"<br />\n";

            if ($ldapscope == "sub") {
                $sr=ldap_search($ldapconn, $ldapbase, $ldapfilter, $ldapattrs);
            } elseif ($ldapscope == "one") {
                $sr=ldap_list($ldapconn, $ldapbase, $ldapfilter, $ldapattrs);
            } else {
                $sr=ldap_read($ldapconn, $ldapbase, $ldapfilter, $ldapattrs);
            }
            echo "Search status: ".ldap_error($ldapconn)."<br />\n";

            echo "Number of entries returned is ".ldap_count_entries($ldapconn, $sr)."<br />";
            $info = ldap_get_entries($ldapconn, $sr);
            echo "Data for ".$info["count"]." items returned:<p>";

            echo "<hr />";
            for ($i=0; $i<$info["count"]; $i++)
            {
                echo "dn: ".$info[$i]["dn"]."<br />";
                for ($j=0; $j<$info[$i]["count"]; $j++)
                {
                    $attrib = $info[$i][$j];
                    for ($k=0; $k<$info[$i][$attrib]["count"]; $k++)
                    {
                        echo $attrib.": ".htmlspecialchars($info[$i][$attrib][$k])."<br />";
                    }
                }
                echo "<hr />";
            }
        }
        ldap_unbind($ldapconn);
    }
    else
    {
        echo "Could not connect!";
    }
}
else
{
?>
</div>
</div>
</div>

<?php
}
?>
<script type="text/javascript">
function sslChanged(sslType)
{
    var port = document.getElementById('port');
    if (port.value == '') {
        if (sslType == 'ssl') { port.value = "636"; }
        if (sslType == 'tls') { port.value = "389"; }
    }
}
</script>

</body>
</head>
