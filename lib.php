<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * Login library file of login/password related Moodle functions.
 *
 * @package    core
 * @subpackage lib
 * @copyright  Catalyst IT
 * @copyright  Peter Bulmer
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_login_extend_signup_form($mform) {
    if ($mform->_formName !== 'local_login_signup_form') {
        return;
    }

    // Remove unwanted fields: username, email2, city and country
    $mform->removeElement('username');
    $mform->removeElement('passwordpolicyinfo');
    $mform->removeElement('email2');
    $mform->removeElement('city');
    $mform->removeElement('country');

    // Re-order email and password
    $mform->insertElementBefore($mform->removeElement('email', false), 'password');

    // Create a hidden field for username and email2
    $mform->addElement('hidden', 'username', '');
    $mform->addElement('hidden', 'email2', '');
}