<h1>Transaction History</h1>

<div class="row mb">
    <?php foreach (['all' => 'All', 'EARN' => 'Earned', 'SPEND' => 'Spent', 'LOCK' => 'Locked', 'REFUND' => 'Refunded'] as $key => $label): ?>
        <a class="btn btn-sm <?php echo $type === $key ? 'btn-primary' : 'btn-outline'; ?>"
           href="?type=<?php echo $key; ?>"><?php echo $label; ?></a>
    <?php endforeach; ?>
</div>

<div class="card table-wrap">
<table class="table">
    <tr><th>Date</th><th>Survey</th><th>Description</th><th>Type</th><th>Points</th></tr>
    <?php if (!$transactions): ?>
        <tr><td colspan="5" class="text-muted">No transactions found.</td></tr>
    <?php endif; ?>
    <?php foreach ($transactions as $t): ?>
        <?php $plus = in_array($t['transaction_type'], ['EARN', 'REFUND']); ?>
        <tr>
            <td class="small"><?php echo nice_date($t['created_at']); ?></td>
            <td class="small"><?php echo $t['title'] ? e($t['title']) : '-'; ?></td>
            <td><?php echo e($t['description']); ?></td>
            <td><span class="badge"><?php echo e($t['transaction_type']); ?></span></td>
            <td class="<?php echo $plus ? 'text-success' : 'text-danger'; ?>">
                <?php echo $plus ? '+' : '-'; ?><?php echo (int)$t['points']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>

<?php if ($pages > 1): ?>
<div class="row mt">
    <?php for ($i = 1; $i <= $pages; $i++): ?>
        <a class="btn btn-sm <?php echo $i === $page ? 'btn-primary' : 'btn-outline'; ?>"
           href="?type=<?php echo e($type); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>
