<?php
include "ad_home.php";
?>
<?php if (isset($_GET['student_id']) && isset($_GET['month'])): 
      $subjects = getSubjectsForStudent($conn, $_GET['student_id']);
      if ($subjects):
    ?>
    <form method="POST">
      <input type="hidden" name="student_id" value="<?= $_GET['student_id'] ?>">
      <input type="hidden" name="month" value="<?= $_GET['month'] ?>">

      <table>
        <tr>
          <th>Subject</th>
          <th>Teacher</th>
          <th>Amount</th>
        </tr>
        <?php foreach ($subjects as $s): ?>
          <tr>
            <td><?= htmlspecialchars($s['subject_name']) ?></td>
            <td><?= htmlspecialchars($s['teacher_name']) ?></td>
            <td>
              <input type="number" name="payment[<?= $s['subject_id'] ?>][amount]" step="0.01">
              <input type="hidden" name="payment[<?= $s['subject_id'] ?>][teacher_id]" value="<?= $s['teacher_id'] ?>">
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="submit" name="submit_payment">Submit Payment</button>
    </form>
    <?php else: echo "<p>No subjects found for this student.</p>"; endif; endif; ?>

    <div class="section">
      <h3>All Teacher Payment Records</h3>
      <table>
        <tr>
          <th>Teacher</th>
          <th>Subject</th>
          <th>Student</th>
          <th>Amount</th>
          <th>Month</th>
          <th>Date</th>
        </tr>
        <?php
        $query = "SELECT p.*, s.full_name AS full_name, sub.name AS name, t.name AS name 
                  FROM payments p
                  JOIN student s ON p.st_id = s.st_id
                  JOIN subject sub ON p.subject_id = sub.subject_id
                  JOIN teacher t ON p.teacher_id = t.teacher_id
                  ORDER BY p.date DESC";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['payment_amount']}</td>
                    <td>{$row['month']}</td>
                    <td>{$row['date']}</td>
                  </tr>";
        }
        ?>
      </table>
    </div>
  </div>
</body>
</html>