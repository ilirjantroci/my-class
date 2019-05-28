<?php
include "header.php"

?>

<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Krijo nje klas te re</h4> 
       <p>
       Krijo nje klas te re</p>
    </div>

    <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Emri
      </th>
      <th class="th-sm">Atesia
      </th>
      <th class="th-sm">Mbiemri
      </th>
      <th class="th-sm">Ditelindja
      </th>
      <th class="th-sm">Vendlidja
      </th>
      <th class="th-sm">Vendbanimi
      </th>
      <th class="th-sm">Nr.Prindit
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
    <tr>
      <td>Garrett Winters</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>63</td>
      <td>2011/07/25</td>
      <td>$170,750</td>
    </tr>
    
</table>

<script type="text/javascript">
	// Material Design example
$(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
    $('input').attr("placeholder", "Search");
    $('input').removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample_wrapper select').removeClass(
    'custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
</script>

</section>
</div>



<?php

include "footer.php"

?>