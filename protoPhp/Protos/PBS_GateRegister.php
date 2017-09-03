<?php
/**
 * Auto generated from PB_server_common.proto at 2017-08-17 23:26:43
 *
 * protos package
 */

namespace Protos {
/**
 * PBS_GateRegister message
 */
class PBS_GateRegister extends \ProtobufMessage
{
    /* Field index constants */
    const LOCAL = 1;
    const OUT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::LOCAL => array(
            'name' => 'local',
            'required' => true,
            'type' => '\Protos\PBS_GateServerInfo'
        ),
        self::OUT => array(
            'name' => 'out',
            'required' => true,
            'type' => '\Protos\PBS_GateServerInfo'
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
        $this->values[self::LOCAL] = null;
        $this->values[self::OUT] = null;
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
     * Sets value of 'local' property
     *
     * @param \Protos\PBS_GateServerInfo $value Property value
     *
     * @return null
     */
    public function setLocal(\Protos\PBS_GateServerInfo $value=null)
    {
        return $this->set(self::LOCAL, $value);
    }

    /**
     * Returns value of 'local' property
     *
     * @return \Protos\PBS_GateServerInfo
     */
    public function getLocal()
    {
        return $this->get(self::LOCAL);
    }

    /**
     * Sets value of 'out' property
     *
     * @param \Protos\PBS_GateServerInfo $value Property value
     *
     * @return null
     */
    public function setOut(\Protos\PBS_GateServerInfo $value=null)
    {
        return $this->set(self::OUT, $value);
    }

    /**
     * Returns value of 'out' property
     *
     * @return \Protos\PBS_GateServerInfo
     */
    public function getOut()
    {
        return $this->get(self::OUT);
    }
}
}