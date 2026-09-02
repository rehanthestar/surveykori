<<h1>Point Center</h1>
<p class="text-muted">Points are an internal exchange unit of Survey Kori. There is no money involved.</p>

<div class="grid-4">
    <div class="stat-card">
        <div class="label">Available Points</div>
        <div class="value"><?php echo (int)$points['available_points']; ?></div>
    </div>
    <div class="stat-card green">
        <div class="label">Earned Points</div>
        <div class="value"><?php echo (int)$points['earned_points']; ?></div>
    </div>
    <div class="stat-card red">
        <div class="label">Spent Points</div>
        <div class="value"><?php echo (int)$points['spent_points']; ?></div>
    </div>
    <div class="stat-card orange">
        <div class="label">Locked Points</div>
        <div class="value"><?php echo (int)$points['locked_points']; ?></div>
    </div>
</div>

<div class="card mt">
    <div class="card-title">
        <h3>Recent Transactions</h3>
        <a class="btn btn-outline btn-sm" href="<?php echo BASE_URL; ?>/points/transactions.php">See all</a>
    </div>

    <div class="row mb">
        <?php foreach (['all' => 'All', 'earned' => 'Earned', 'spent' => 'Spent', 'refund' => 'Refund'] as $key => $label): ?>
            <a class="btn btn-sm <?php echo $filter === $key ? 'btn-primary' : 'btn-outline'; ?>"
               href="?filter=<?php echo $key; ?>"><?php echo $label; ?></a>
        <?php endforeach; ?>
    </div>

    <?php if (!$transactions): ?>
        <p class="text-muted small">No transactions found.</p>
    <?php else: ?>
    <div class="table-wrap">
    <table class="table">
        <tr><th>Date</th><th>Activity</th><th>Type</th><th>Points</th></tr>
        <?php foreach ($transactions as $t): ?>
            <?php $plus = in_array($t['transaction_type'], ['EARN', 'REFUND']); ?>
            <tr>
                <td class="small"><?php echo nice_date($t['created_at']); ?></td>
                <td><?php echo e($t['description']); ?></td>
                <td><span class="badge"><?php echo e($t['transaction_type']); ?></span></td>
                <td class="<?php echo $plus ? 'text-success' : 'text-danger'; ?>">
                    <?php echo $plus ? '+' : '-'; ?><?php echo (int)$t['points']; ?> Points
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <?php endif; ?>
</div>