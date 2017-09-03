<?php
/***
 * 兑换
 * @param array   $msgArr  2*  成功  3.* 超时无响应  4.*丢失或参数缺失  5.* 服务器配置问题  6.*来不明  7.* 权限问题 8.* 配置问题
 * @param int     $page         页码
 * @param int     $num          页数
 * @param int     $channelid    渠道id
 * @param int     $platform     平台号  1-iso  2-安卓
 * @param unknow  $version      版本号
 ***/
namespace Jy_api\Controller;
use Jy_api\Controller\ComController;
use Protos\PBS_UsrDataOprater;
use Protos\PBS_UsrDataOpraterReturn;
use RedisProto\RPB_PlayerData;
use Think\Controller;
use Think\Model;
class ExchangeController extends ComController {
    public function index(){
        $DataInfo       =       $this->DataInfo;
        $msgArr         =       $this->msgArr;
        $obj   = new \Common\Lib\func();
        $result = 2001;
        $info   =  array();


        $msgArr[3002] = "与游戏服务器断开，请稍后再试！";
        $msgArr[3003] = "与游戏服务器断开，请稍后再试！";
        $msgArr[3004] = "与游戏服务器断开，请稍后再试！";
        $msgArr[3005] = "与游戏服务器断开，请稍后再试！";
        $msgArr[3006] = "网络错误，请稍后再试！";
        $msgArr[4006] = "用户信息，缺失！";
        $msgArr[4007] = "物品信息，缺失！";
        $msgArr[5002] = "物品信息，缺失！";
        $playerid = $DataInfo['playerid'];
        if(empty($playerid)){
            $result = 4006;
            goto response;
        }
        $GoodsID =  $DataInfo['GoodsID'];
        if(empty($GoodsID)){
            $result = 4007;
            goto response;
        }
        $Number = empty($DataInfo['Number'])? 1:$DataInfo['Number'];
        //查询物品信息
        $catGoodsAll = array(
            'Id',
            'Name',
            'CurrencyType',
            'CurrencyNum',
            'IssueType',
            'GetNum',
            'Type',
        );

        $catGoodsAll = M('jy_goods_all')
                       ->where('Id ='.$GoodsID.' and IsDel = 1')
                       ->field($catGoodsAll)
                       ->find();

        //扣除兑换币
        //已入protobuf 类
        $obj->ProtobufObj(array(
            'Protos/PBS_UsrDataOprater.php',
            'Protos/PBS_UsrDataOpraterReturn.php',
            'RedisProto/RPB_PlayerData.php',
        ));
        $PBS_UsrDataOprater = new PBS_UsrDataOprater();
        $RPB_PlayerData     = new RPB_PlayerData();
        $PBS_UsrDataOprater->setPlayerid($playerid);
        $PBS_UsrDataOprater->setOpt(5);
        //兑换币  2-金币  3-钻石
        $CurrencyType = $catGoodsAll['CurrencyType'];
        //兑换币数量
        $CurrencyNum  = $catGoodsAll['CurrencyNum'];
        switch ($CurrencyType){
            //金币
            case 2:
                $RPB_PlayerData->setGold($CurrencyNum);
            break;
            //钻石
            case 3:
                $RPB_PlayerData->setDiamond($CurrencyNum);
            break;
        }
        $PBS_UsrDataOprater->setPlayerData($RPB_PlayerData);
        $PBSUsrDataOpraterString = $PBS_UsrDataOprater->serializeToString();
        //发送请求
        $PBS_UsrDataOpraterRespond =  $obj->ProtobufSend('protos.PBS_UsrDataOprater',$PBSUsrDataOpraterString,$playerid);
        if($PBS_UsrDataOpraterRespond  == 504){
            $result = 3002;
            goto response;
        }
        if(strlen($PBS_UsrDataOpraterRespond)==0){
            $result = 3003;
            goto response;
        }
        //接受回应
        $PBS_UsrDataOpraterReturn =  new PBS_UsrDataOpraterReturn();
        $PBS_UsrDataOpraterReturn->parseFromString($PBS_UsrDataOpraterRespond);
        $ReplyCode = $PBS_UsrDataOpraterReturn->getCode();
        //判断结果
        if($ReplyCode != 1){
            $result = $ReplyCode;
            goto response;
        }
        //增加物品
        $PBS_UsrDataOprater->reset();
        $RPB_PlayerData->reset();
        $PBS_UsrDataOprater->setPlayerid($playerid);
        $PBS_UsrDataOprater->setOpt(5);
        //物品类型
        $Type   =  $catGoodsAll['Type'];
        //物品数量
        $GetNum = $catGoodsAll['GetNum'];
        switch ($Type){
            //金币
            case 1:
                $RPB_PlayerData->setGold($GetNum);
                break;
            //钻石
            case 2:
                $RPB_PlayerData->setDiamond($GetNum);
                break;
        }
        $PBS_UsrDataOprater->setPlayerData($RPB_PlayerData);
        $PBSUsrDataOpraterString = $PBS_UsrDataOprater->serializeToString();

        //发送请求
        $PBS_UsrDataOpraterRespond =  $obj->ProtobufSend('protos.PBS_UsrDataOprater',$PBSUsrDataOpraterString,$playerid);
        if($PBS_UsrDataOpraterRespond  == 504){
            $result = 3004;
            goto response;
        }
        if(strlen($PBS_UsrDataOpraterRespond)==0){
            $result = 3005;
            goto response;
        }
        //接受回应
        $PBS_UsrDataOpraterReturn =  new PBS_UsrDataOpraterReturn();
        $PBS_UsrDataOpraterReturn->parseFromString($PBS_UsrDataOpraterRespond);
        $ReplyCode = $PBS_UsrDataOpraterReturn->getCode();
        //判断结果
        if($ReplyCode != 1){
            $result = $ReplyCode;
            goto response;
        }
        //增加兑换记录
        $dataUsersExchangeLog = array(
            'Number'        =>      $Number,
            'GoodsName'     =>      $catGoodsAll['Name'],
            'playerid'      =>      $playerid,
            'GoodsID'       =>      $catGoodsAll['Id'],
        );
        $addUsersExchangeLog = M('jy_users_exchange_log')
                              ->add($dataUsersExchangeLog);
        if(!$addUsersExchangeLog){
            $result = 3006;
            goto response;
        }
        response:
            $response = array(
                'result' => $result,
                'msg' => $msgArr[$result],
                'sessionid'=>$DataInfo['sessionid'],
                'data' => $info,
            );
            $this->response($response,'json');


    }
}