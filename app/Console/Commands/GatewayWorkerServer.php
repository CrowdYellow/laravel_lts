<?php

namespace App\Console\Commands;

use GatewayWorker\BusinessWorker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;
use Illuminate\Console\Command;
use Workerman\Worker;

class GatewayWorkerServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gateway-worker:server {action} {--daemon}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a GatewayWorker Server.';

    /**
     * Register server address
     * @var string
     */
    protected $registerAddr;

    /**
     * WebSocket server address
     * @var string
     */
    protected $webSocketAddr;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->registerAddr  = env('INTRANET_IP').':'.env('REGISTER_PORT');

        $this->webSocketAddr = env('INTRANET_IP').':'.env('WEBSOCKET_PORT');

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        global $argv;

        if (!in_array($action = $this->argument('action'), ['start', 'stop', 'restart'])) {
            $this->error('Error Arguments');
            exit;
        }

        $argv[0] = 'gateway-worker:server';
        $argv[1] = $action;
        $argv[2] = $this->option('daemon') ? '-d' : '';

        $this->start();
    }

    private function start()
    {
        $this->startGateWay();
        $this->startBusinessWorker();
        $this->startRegister();
        Worker::runAll();
    }

    private function startBusinessWorker()
    {
        $worker                  = new BusinessWorker();
        $worker->name            = 'BusinessWorker';                        #设置BusinessWorker进程的名称
        $worker->count           = 1;                                       #设置BusinessWorker进程的数量
        $worker->registerAddress = $this->registerAddr;                        #注册服务地址
        $worker->eventHandler    = \App\GatewayWorker\Events::class;            #设置使用哪个类来处理业务,业务类至少要实现onMessage静态方法，onConnect和onClose静态方法可以不用实现
    }

    private function startGateWay()
    {
        $gateway = new Gateway("websocket://".$this->webSocketAddr);
        $gateway->name                 = 'Gateway';                         #设置Gateway进程的名称，方便status命令中查看统计
        $gateway->count                = 1;                                 #进程的数量
        $gateway->lanIp                = '127.0.0.1';                       #内网ip,多服务器分布式部署的时候需要填写真实的内网ip
        $gateway->startPort            = 2300;                              #监听本机端口的起始端口
        $gateway->pingInterval         = 30;
        $gateway->pingNotResponseLimit = 10;                                #服务端主动发送心跳
        $gateway->pingData             = '{"type":"ping"}';
        $gateway->registerAddress      = $this->registerAddr;               #注册服务地址
    }

    private function startRegister()
    {
        new Register('text://'.$this->registerAddr);
    }
}
