<?php

/*
+---------------------------------------------------------------------------+
| OpenX v${RELEASE_MAJOR_MINOR}                                                                |
| =======${RELEASE_MAJOR_MINOR_DOUBLE_UNDERLINE}                                                                |
|                                                                           |
| Copyright (c) 2003-2008 OpenX Limited                                     |
| For contact details, see: http://www.openx.org/                           |
|                                                                           |
| This program is free software; you can redistribute it and/or modify      |
| it under the terms of the GNU General Public License as published by      |
| the Free Software Foundation; either version 2 of the License, or         |
| (at your option) any later version.                                       |
|                                                                           |
| This program is distributed in the hope that it will be useful,           |
| but WITHOUT ANY WARRANTY; without even the implied warranty of            |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
| GNU General Public License for more details.                              |
|                                                                           |
| You should have received a copy of the GNU General Public License         |
| along with this program; if not, write to the Free Software               |
| Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA |
+---------------------------------------------------------------------------+
$Id$
*/

$className = 'postscript_install_auth';

/**
 * Installs any additional data after the plugins are installed
 *
 */
class postscript_install_auth
{
    /**
     *
     * @return boolean  True on success, else false
     */
    function execute(){
    	// if we have the type
    	if (isset($GLOBALS['_MAX']['CONF']['authentication']['type'])){
    		//this value is name_extension:name_group:name_component
            $value = "authentication:auth:authComponent";     
	        //with Admin_Settings we can write on conf file
	        $oSettings  = new OA_Admin_Settings();
	        //here the type is updated to use this plugin
	        $oSettings->settingChange("authentication","type",$value);
	        //finally is saved on conf file
	        $oSettings->writeConfigChange();
	        return true;
	    }else{	    	
	    	return false;
	    }
    }
}