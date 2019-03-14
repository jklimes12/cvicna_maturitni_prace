<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

      <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="mt-4 h2">Knihy</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
          </button>
        </div>
      </div>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id_knihy</th>
              <th>nazev</th>
              <th>jméno</th>
              <th>příjmení</th>
              <th>strany</th>
              <th>upravit</th>
            </tr>
          </thead>
              <?php $sql = $mysqli->prepare("SELECT b.id_kniha, b.nazev, b.strany, a.jmeno, a.prijmeni
              FROM knihy b
              JOIN autor_knihy ab ON b.id_kniha = ab.id_knihy
              JOIN autor a ON ab.id_autor = a.id_autor");
                      $sql -> execute();
                      $result = $sql->get_result();
                      while ($book = $result->fetch_assoc()) {
                ?>
                <tr>
                   <th><?php echo $book["id_kniha"];?></th>
                   <th><?php echo $book["nazev"];?></th>
                   <th><?php echo $book["jmeno"];?></th>
                   <th><?php echo $book["prijmeni"];?></th>
                   <th><?php echo $book["strany"]; echo " stran";?></th>
                   <th><a class="btn btn-primary" href="editbook.php?id_kniha=<?php echo $book["id_kniha"]; ?>">edit</a></th>
                </tr>
                <?php
              };
             ?>
        </table>

      </div>

<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
