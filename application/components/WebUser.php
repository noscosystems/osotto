<?php

    namespace application\components;

    use \Yii;
    use \CException;
    use \CEvent as Event;
    use \application\models\db\Users as User;

    /**
     * Web User
     *
     * @author      Zander Baldwin <mynameiszanders@gmail.com>
     * @license     MIT/X11 <http://j.mp/mit-license>
     * @copyright   Zander Baldwin <http://mynameis.zande.rs>
     */
    class WebUser extends \CWebUser
    {

        protected $user;


        /**
         * Constructor Method
         *
         * @access public
         * @return void
         */
        public function __construct()
        {
            \application\components\EventManager::attach($this);
        }


        /**
         * Initialisation Method
         *
         * @access public
         * @return void
         */
        public function init()
        {
            parent::init();
            // Raise an "onEndUser" event.
            $this->onStartUser(new Event($this));
            // Is the user logged in or not?
            if(!$this->getState('isGuest')) {
                // Load the database model for the currently logged in user so we can use their information throughout
                // the request.
                $this->user = User::model()->findByPk($this->getState('id'));
                // Raise an "onAuthenticated" event; specifying that the end-user is logged in.
                $this->onAuthenticated(new Event($this));
            }
            else {
                // Raise an "onGuest" event; specifying that the end-user is not logged in.
                $this->onGuest(new Event($this));
            }
        }


        /**
         * User Model
         *
         * @access public
         * @return User|null
         */
        public function model()
        {
            return is_object($this->user)
                ? $this->user
                : null;
        }


        /**
         * Get: Display Name
         *
         * @access public
         * @return string|null
         */
        public function getDisplayName()
        {
            return is_object($this->user)
                ? $this->user->displayName
                : null;
        }


        /**
         * Get: Full Name
         *
         * @access public
         * @return string|null
         */
        public function getFullName()
        {
            return is_object($this->user)
                ? $this->user->fullName
                : null;
        }

        /**
         * Get: Branch
         *
         * @access public
         * @return string|null
         */
        public function getBranch()
        {
            return is_object($this->user)
                ? $this->user->branch
                : null;
        }

        /* ================= *\
        |  EVENT DEFINITIONS  |
        \* ================= */

        /**
         * Event: End User
         *
         * @access public
         * @return void
         */
        public function onStartUser(Event $event)
        {
            // Use __FUNCTION__ instead of __METHOD__, as the latter will also return the name of the class that the
            //method belongs to, which is not desired.
            if($this->hasEventHandler($name = __FUNCTION__)) {
                $this->raiseEvent($name, $event);
            }
        }

        /**
         * Event: Start Authenticate Process
         *
         * @access public
         * @return void
         */
        public function onGuest(Event $event)
        {
            // Use __FUNCTION__ instead of __METHOD__, as the latter will also return the name of the class that the
            //method belongs to, which is not desired.
            if($this->hasEventHandler($name = __FUNCTION__)) {
                $this->raiseEvent($name, $event);
            }
        }

        /**
         * Event: Start Authenticate Process
         *
         * @access public
         * @return void
         */
        public function onAuthenticated(Event $event)
        {
            // Use __FUNCTION__ instead of __METHOD__, as the latter will also return the name of the class that the
            //method belongs to, which is not desired.
            if($this->hasEventHandler($name = __FUNCTION__)) {
                $this->raiseEvent($name, $event);
            }
        }

        /**
         * Get: Priv
         *
         * @shortcut
         * @access public
         * @return integer
         */
        public function getPriv()
        {
            return $this->getPrivilege();
        }


        /**
         * Get: Privilege
         *
         * @access public
         * @return integer
         */
        public function getPrivilege()
        {
            return is_object($this->user) && isset($this->user->priv)
                ? (int) $this->user->priv
                : 1;
        }

    }
