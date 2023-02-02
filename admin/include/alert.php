<?php
if ($session->has('danger'))
    echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        ' . $session->get('danger') . '
    </div>';
else if (($session->has('info'))) {
    echo '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
        ' . $session->get('info') . '
    </div>';
} else if (($session->has('warning'))) {
    echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        ' . $session->get('warning') . '
    </div>';
} else if (($session->has('success'))) {
    echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        ' . $session->get('success') . '
        </div>';
}
