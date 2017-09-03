<?php
/**
 * Auto generated from PB_usr_rpc.proto at 2017-08-17 23:26:56
 *
 * protos package
 */

namespace Protos {
/**
 * PBS_UsrDataOprater message
 */
class PBS_UsrDataOprater extends \ProtobufMessage
{
    /* Field index constants */
    const PLAYERID = 1;
    const OPT = 2;
    const ACCOUNT_DATA = 3;
    const PLAYER_DATA = 4;
    const ITEM_OPT = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PLAYERID => array(
            'name' => 'playerid',
            'required' => true,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::OPT => array(
            'name' => 'opt',
            'required' => true,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::ACCOUNT_DATA => array(
            'name' => 'account_data',
            'required' => false,
            'type' => '\RedisProto\RPB_AccountData'
        ),
        self::PLAYER_DATA => array(
            'name' => 'player_data',
            'required' => false,
            'type' => '\RedisProto\RPB_PlayerData'
        ),
        self::ITEM_OPT => array(
            'name' => 'item_opt',
            'required' => false,
            'type' => '\Protos\PBS_ItemOpt'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::PLAYERID] = null;
        $this->values[self::OPT] = null;
        $this->values[self::ACCOUNT_DATA] = null;
        $this->values[self::PLAYER_DATA] = null;
        $this->values[self::ITEM_OPT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'playerid' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setPlayerid($value)
    {
        return $this->set(self::PLAYERID, $value);
    }

    /**
     * Returns value of 'playerid' property
     *
     * @return integer
     */
    public function getPlayerid()
    {
        $value = $this->get(self::PLAYERID);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'opt' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setOpt($value)
    {
        return $this->set(self::OPT, $value);
    }

    /**
     * Returns value of 'opt' property
     *
     * @return integer
     */
    public function getOpt()
    {
        $value = $this->get(self::OPT);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'account_data' property
     *
     * @param \RedisProto\RPB_AccountData $value Property value
     *
     * @return null
     */
    public function setAccountData(\RedisProto\RPB_AccountData $value=null)
    {
        return $this->set(self::ACCOUNT_DATA, $value);
    }

    /**
     * Returns value of 'account_data' property
     *
     * @return \RedisProto\RPB_AccountData
     */
    public function getAccountData()
    {
        return $this->get(self::ACCOUNT_DATA);
    }

    /**
     * Sets value of 'player_data' property
     *
     * @param \RedisProto\RPB_PlayerData $value Property value
     *
     * @return null
     */
    public function setPlayerData(\RedisProto\RPB_PlayerData $value=null)
    {
        return $this->set(self::PLAYER_DATA, $value);
    }

    /**
     * Returns value of 'player_data' property
     *
     * @return \RedisProto\RPB_PlayerData
     */
    public function getPlayerData()
    {
        return $this->get(self::PLAYER_DATA);
    }

    /**
     * Sets value of 'item_opt' property
     *
     * @param \Protos\PBS_ItemOpt $value Property value
     *
     * @return null
     */
    public function setItemOpt(\Protos\PBS_ItemOpt $value=null)
    {
        return $this->set(self::ITEM_OPT, $value);
    }

    /**
     * Returns value of 'item_opt' property
     *
     * @return \Protos\PBS_ItemOpt
     */
    public function getItemOpt()
    {
        return $this->get(self::ITEM_OPT);
    }
}
}