<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.16.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class ThriftHiveMetastore_get_table_objects_by_name_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'dbname',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'tbl_names',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var string
     */
    public $dbname = null;
    /**
     * @var string[]
     */
    public $tbl_names = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['dbname'])) {
                $this->dbname = $vals['dbname'];
            }
            if (isset($vals['tbl_names'])) {
                $this->tbl_names = $vals['tbl_names'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftHiveMetastore_get_table_objects_by_name_args';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->dbname);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->tbl_names = array();
                        $_size1502 = 0;
                        $_etype1505 = 0;
                        $xfer += $input->readListBegin($_etype1505, $_size1502);
                        for ($_i1506 = 0; $_i1506 < $_size1502; ++$_i1506) {
                            $elem1507 = null;
                            $xfer += $input->readString($elem1507);
                            $this->tbl_names []= $elem1507;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ThriftHiveMetastore_get_table_objects_by_name_args');
        if ($this->dbname !== null) {
            $xfer += $output->writeFieldBegin('dbname', TType::STRING, 1);
            $xfer += $output->writeString($this->dbname);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tbl_names !== null) {
            if (!is_array($this->tbl_names)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('tbl_names', TType::LST, 2);
            $output->writeListBegin(TType::STRING, count($this->tbl_names));
            foreach ($this->tbl_names as $iter1508) {
                $xfer += $output->writeString($iter1508);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
