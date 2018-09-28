<?php
namespace App\Repositories\Dashboard;

interface DashboardRepositoryInterface
{
    /**
     * @param array $criteria
     * @return mixed
     */
    public function getAllConversation(array $criteria);

    /**
     * @param array $criteria
     * @return mixed
     */
    public function getTotalResponded(array $criteria);

    /**
     * @param array $criteria
     * @return mixed
     */
    public function getTotalSkipped(array $criteria);

    /**
     * @param array $criteria
     * @return mixed
     */
    public function getTotalEscalateCase(array $criteria);

    /**
     * @param array $criteria
     * @return mixed
     */
    public function getTotalComment(array $criteria);

    /**
     * @param array $criteria
     * @return mixed
     */
    public function getTotalMessage(array $criteria);

    /**
     * @param array $criteria
     * @return mixed
     */
    public function ConversationSummary(array $criteria);
}