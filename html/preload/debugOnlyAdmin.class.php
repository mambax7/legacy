<?php
/**
 * This is preload to show debug(error) messages to only site administrator
 * 
 */
class debugOnlyAdmin extends XCube_ActionFilter
{
    public function postFilter() {
        if ($GLOBALS['xoopsErrorHandler'] && is_object($GLOBALS['xoopsErrorHandler'])) {
            $root = XCube_Root::getSingleton();
            if (! $root->mContext->mUser->isInRole('Site.Administrator')) {
                $GLOBALS['xoopsErrorHandler']->activate(false);
            }
        }
    }
}
