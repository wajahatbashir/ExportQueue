<?php

namespace WB\ExportQueue\Cron;

use Psr\Log\LoggerInterface;
use Magento\Framework\MessageQueue\ConsumerInterface;

class ProcessExportQueue
{
    protected $queueConsumer;
    protected $logger;

    public function __construct(
        ConsumerInterface $queueConsumer,
        LoggerInterface $logger
    ) {
        $this->queueConsumer = $queueConsumer;
        $this->logger = $logger;
    }

    public function execute()
    {
        try {
            $this->queueConsumer->process('exportProcessor');
        } catch (\Exception $e) {
            $this->logger->error('Error processing export queue: ' . $e->getMessage());
        }
    }
}
