<?php
/**
 * OWASP Enterprise Security API (ESAPI)
 * 
 * This file is part of the Open Web Application Security Project (OWASP)
 * Enterprise Security API (ESAPI) project. For details, please see
 * http://www.owasp.org/esapi.
 *
 * Copyright (c) 2007 - The OWASP Foundation
 * 
 * The ESAPI is published by OWASP under the LGPL. You should read and accept the
 * LICENSE before you use, modify, and/or redistribute this software.
 * 
 * @author Jeff Williams <a href="http://www.aspectsecurity.com">Aspect Security</a>
 * @package org.owasp.esapi.interfaces;
 * @created 2007
 */


/**
 * The IUser interface represents an application user or user account. There is quite a lot of information that an
 * application must store for each user in order to enforce security properly. There are also many rules that govern
 * authentication and identity management.
 * <P>
 * <img src="doc-files/Authenticator.jpg" height="600">
 * <P>
 * A user account can be in one of several states. When first created, a User should be disabled, not expired, and
 * unlocked. To start using the account, an administrator should enable the account. The account can be locked for a
 * number of reasons, most commonly because they have failed login for too many times. Finally, the account can expire
 * after the expiration date has been reached. The User must be enabled, not expired, and unlocked in order to pass
 * authentication.
 * 
 * @author <a href="mailto:jeff.williams@aspectsecurity.com?subject=ESAPI question">Jeff Williams</a> at <a
 * href="http://www.aspectsecurity.com">Aspect Security</a>
 * @since June 1, 2007
 */

interface IUser {

    /**
     * Adds a role to an account.
     * 
     * @param role the role
     * @throws AuthenticationException the authentication exception
     */
    public function addRole($role);

    /**
     * Adds the roles.
     * 
     * @param newRoles the new roles
     * @throws AuthenticationException the authentication exception
     */
    public function addRoles($newRoles);

    /**
     * Sets the user's password, performing a verification of the user's old password, the equality of the two new
     * passwords, and the strength of the new password.
     * 
     * @param oldPassword the old password
     * @param newPassword1 the new password1
     * @param newPassword2 the new password2
     * @throws AuthenticationException the authentication exception
     * @throws EncryptionException 
     */
    public function changePassword($oldPassword, $newPassword1, $newPassword2);

    /**
     * Disable account.
     * 
     * @throws AuthenticationException the authentication exception
     */
    public function disable();

    /**
     * Enable account.
     * 
     * @throws AuthenticationException the authentication exception
     */
    public function enable();

    /**
     * Gets the account name.
     * 
     * @return the account name
     */
    public function getAccountName();

    /**
     * Gets the CSRF token.
     * 
     * @return the CSRF token
     */
    public function getCSRFToken();

    /**
     * Returns the number of failed login attempts since the last successful login for an account. This method is
     * intended to be used as a part of the account lockout feature, to help protect against brute force attacks.
     * However, the implementor should be aware that lockouts can be used to prevent access to an application by a
     * legitimate user, and should consider the risk of denial of service.
     * 
     * @return the number of failed login attempts since the last successful login
     */
    public function getFailedLoginCount();

    /**
     * Returns the last host address used by the user. This will be used in any log messages generated by the processing
     * of this request.
     * 
     * @return
     */
    public function getLastHostAddress();

	/**
     * Returns the date of the last failed login time for a user. This date should be used in a message to users after a
     * successful login, to notify them of potential attack activity on their account.
     * 
     * @return date of the last failed login
     * @throws AuthenticationException the authentication exception
     */
    public function getLastFailedLoginTime();

    /**
     * Returns the date of the last successful login time for a user. This date should be used in a message to users
     * after a successful login, to notify them of potential attack activity on their account.
     * 
     * @return date of the last successful login
     */
    public function getLastLoginTime();

    /**
     * Gets the last password change time.
     * 
     * @return the last password change time
     */
    public function getLastPasswordChangeTime();

    /**
     * Gets the remember token.
     * 
     * @return the remember token
     */
    public function getRememberToken();

    /**
     * Gets the roles assigned to a particular account.
     * 
     * @return an immutable set of roles
     */
    public function getRoles();

    /**
     * Gets the screen name.
     * 
     * @return the screen name
     */
    public function getScreenName();

    /**
     * Increment failed login count.
     */
    public function incrementFailedLoginCount();

    /**
     * Checks if is anonymous.
     * 
     * @return true, if is anonymous
     */
    public function isAnonymous();

    /**
     * Checks if an account is currently enabled.
     * 
     * @return true, if is enabled account
     */
    public function isEnabled();

    /**
     * Checks if an account is expired.
     * 
     * @return true, account is expired
     */
    public function isExpired();

    /**
     * Checks if an account has been assigned a particular role.
     * 
     * @param role the role
     * @return true, if is user in role
     */
    public function isInRole($role);

    /**
     * Returns true if the request is the first one of a new login session. This is intended to be used as a flag to
     * display a message about the user's last successful login time.
     * 
     * @return
     */
    public function isFirstRequest();

    /**
     * Checks if an account is unlocked.
     * 
     * @return true, account is unlocked
     */
    public function isLocked();

    /**
     * Tests to see if the user is currently logged in.
     * 
     * @return true if the user is logged out
     */
    public function isLoggedIn();

    /**
     * Tests to see if the user's session has exceeded the absolute time out.
     * 
     * @param session the session
     * @return whether user's session has exceeded the absolute time out
     */
    public function isSessionAbsoluteTimeout($session);

    /**
     * Tests to see if the user's session has timed out from inactivity.
     * 
     * @param session the session
     * @return whether user's session has timed out from inactivity
     */
    public function isSessionTimeout($session);

    /**
     * Lock the user's account.
     */
    public function lock();

    /**
     * Login with password.
     * 
     * @param password the password
     * @throws AuthenticationException the authentication exception
     */
    public function loginWithPassword($password);

    /**
     * Logout this user.
     */
    public function logout();

    /**
     * Removes a role from an account.
     * 
     * @param role the role
     * @throws AuthenticationException the authentication exception
     */

    public function removeRole($role);

    /**
     * Returns a token to be used as a prevention against CSRF attacks. This token should be added to all links and
     * forms. The application should verify that all requests contain the token, or they may have been generated by a
     * CSRF attack. It is generally best to perform the check in a centralized location, either a filter or controller.
     * See the verifyCSRFToken method.
     * 
     * @return the string
     * @throws AuthenticationException the authentication exception
     */
    public function resetCSRFToken();

    /**
     * Returns a token to be used as a "remember me" cookie. The cookie is not seen by the user and can be fairly long,
     * at least 20 digits is suggested to prevent brute force attacks. See loginWithRememberToken.
     * 
     * @return the string
     * @throws AuthenticationException the authentication exception
     */
    public function resetRememberToken();

    /**
     * Sets the account name.
     * 
     * @param accountName the new account name
     */
    public function setAccountName($accountName);

    /**
     * Sets the roles.
     * 
     * @param roles the new roles
     */
    public function setRoles($roles);

    /**
     * Sets the screen name.
     * 
     * @param screenName the new screen name
     */
    public function setScreenName($screenName);

    /**
     * Unlock account.
     */
    public function unlock();

	/**
	 * Verify that the supplied password matches the password for this user. This method
	 * is typically used for "reauthentication" for the most sensitive functions, such
	 * as transactions, changing email address, and changing other account information.
	 * 
	 * @param password
	 * @return
	 * @throws EncryptionException 
	 */
	public function verifyPassword($password);

    
}
?>