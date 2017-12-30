<?php

	echo md5(md5(hash('sha512',md5(base64_encode(hash('sha1','flyparadise'))))));

?>