<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/dist/excanvas.min.js"></script><![endif]-->

<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.donutRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.css" />

<!--Action boxes-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) : ?>
                <li class="bg_lb">
                    <a href="<?= base_url() ?>/clientes"> <i class="fas fa-users" style="font-size:36px"></i>
                        <div> <?= ($this->lang->line('tsos_painel_cli')) ?><span class="badge badge-light"><?= ($this->lang->line('tsos_painel_f1')) ?></span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) : ?>
                <li class="bg_lg">
                    <a href="<?= base_url() ?>/produtos"> <i class="fas fa-shopping-bag" style="font-size:36px"></i>
                        <div><?= ($this->lang->line('tsos_painel_produtos')) ?> <span class="badge badge-light"><?= ($this->lang->line('tsos_painel_f2')) ?></span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) : ?>
                <li class="bg_ly">
                    <a href="<?= base_url() ?>/servicos"> <i class="fas fa-wrench" style="font-size:36px"></i>
                        <div><?= ($this->lang->line('tsos_painel_services')) ?> <span class="badge badge-light"><?= ($this->lang->line('tsos_painel_f3')) ?></span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
                <li class="bg_lo">
                    <a href="<?= base_url() ?>/os"> <i class="fas fa-diagnoses" style="font-size:36px"></i>
                        <div><?= ($this->lang->line('tsos_painel_os')) ?> <span class="badge badge-light"><?= ($this->lang->line('tsos_painel_f4')) ?></span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) : ?>
                <li class="bg_ls">
                    <a href="<?= base_url() ?>/vendas"><i class="fas fa-cash-register" style="font-size:36px"></i>
                        <div><?= ($this->lang->line('tsos_painel_vendas')) ?> <span class="badge badge-light"><?= ($this->lang->line('tsos_painel_f6')) ?></span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vGarantia')) : ?>
                <li class="bg_ls">
                    <a href="<?= base_url() ?>/garantias"><i class="fas fa-book" style="font-size:36px"></i>
                        <div><?= ($this->lang->line('tsos_painel_tergarantia')) ?><span class="badge badge-light"><?= ($this->lang->line('tsos_painel_f7')) ?></span></div>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</div>
<!--End-Action boxes-->

<div class="row-fluid" style="margin-top: 0">

    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                <h5><?= ($this->lang->line('tsos_painel_prodstoqmin')) ?></h5>
            </div>
            <div class="widget-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?= ($this->lang->line('tsos_painel_stoqcoditem')) ?></th>
                            <th><?= ($this->lang->line('tsos_painel_prod')) ?></th>
                            <th><?= ($this->lang->line('tsos_painel_prodprvenda')) ?></th>
                            <th><?= ($this->lang->line('tsos_painel_stoq')) ?></th>
                            <th><?= ($this->lang->line('tsos_painel_stoqmin')) ?></th>
                            <th><?= ($this->lang->line('tsos_painel_acoes')) ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($produtos != null) : ?>
                            <?php foreach ($produtos as $p) : ?>
                                <tr>
                                    <td>
                                        <?= $p->idProdutos ?>
                                    </td>
                                    <td>
                                        <?= $p->descricao ?>
                                    </td>
                                    <td><?= ($this->lang->line('tsos_painel_rs')) ?>
                                        <?= $p->precoVenda ?>
                                    </td>
                                    <td>
                                        <?= $p->estoque ?>
                                    </td>
                                    <td>
                                        <?= $p->estoqueMinimo ?>
                                    </td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) : ?>
                                            <a href="<?= base_url() ?>/produtos/editar/<?= $p->idProdutos ?>" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3"><?= ($this->lang->line('tsos_painel_prodstoqnullinfo')) ?></td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5><?= ($this->lang->line('tsos_painel_osopen')) ?></h5>
            </div>
            <div class="widget-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>N° OS</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                            <th>Cliente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens != null) : ?>
                            <?php foreach ($ordens as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?php if ($o->dataFinal != null) {
                                                    echo date('d/m/Y', strtotime($o->dataFinal));
                                                } else {
                                                    echo "";
                                                } ?></td>

                                    <td>
                                        <?= $o->nomeCliente ?>
                                    </td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
                                            <a href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn">
                                                <i class="fas fa-eye"></i> </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhuma OS em aberto.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="fas fa-diagnoses"></i></span>
            <h5>Ordens de Serviço Aguardando Peças</h5>
        </div>
        <div class="widget-content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>N° OS</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Cliente</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens1 != null) : ?>
                        <?php foreach ($ordens1 as $o) : ?>
                            <tr>
                                <td>
                                    <?= $o->idOs ?>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($o->dataFinal)) ?>
                                </td>
                                <td>
                                    <?= $o->nomeCliente ?>
                                </td>
                                <td>
                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
                                        <a href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn">
                                            <i class="fas fa-eye"></i> </a>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3">Nenhuma OS Aguardando Peças.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


<?php if ($estatisticas_financeiro != null) {
    if ($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null) {  ?>

        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) : ?>
            <div class="row-fluid" style="margin-top: 0">

                <div class="span4">

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="fas fa-hand-holding-usd"></i></span>
                            <h5>Estatísticas financeiras - Realizado</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="chart-financeiro" style=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="span4">

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="fas fa-hand-holding-usd"></i></span>
                            <h5>Estatísticas financeiras - Pendente</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="chart-financeiro2" style=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="span4">

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="fas fa-cash-register"></i></span>
                            <h5>Total em caixa / Previsto</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="chart-financeiro-caixa" style=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif ?>

<?php  }
} ?>

<?php if ($os != null && $this->permission->checkPermission($this->session->userdata('permissao'), 'rOs')) { ?>
    <div class="row-fluid" style="margin-top: 0">

        <div class="span12">

            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="fas fa-diagnoses"></i></span>
                    <h5>Estatísticas de OS</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <div class="span12">
                            <div id="chart-os" style=""></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Estatísticas do Sistema</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                            <li class="bg_lh"><i class="fas fa-users"></i> <strong>
                                    <?= $this->db->count_all('clientes'); ?></strong> <small>Clientes</small></li>
                            <li class="bg_lh"><i class="fas fa-shopping-bag"></i> <strong>
                                    <?= $this->db->count_all('produtos'); ?></strong> <small>Produtos </small></li>
                            <li class="bg_lh"><i class="fas fa-diagnoses"></i> <strong>
                                    <?= $this->db->count_all('os'); ?></strong> <small>Ordens de Serviço</small></li>
                            <li class="bg_lh"><i class="fas fa-wrench"></i> <strong>
                                    <?= $this->db->count_all('servicos'); ?></strong> <small>Serviços</small></li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($os != null && $this->permission->checkPermission($this->session->userdata('permissao'), 'rOs')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var data = [
                <?php foreach ($os as $o) {
                        echo "['" . $o->status . "', " . $o->total . "],";
                    } ?>

            ];
            var plot1 = jQuery.jqplot('chart-os', [data], {
                seriesDefaults: {
                    // Make this a pie chart.
                    renderer: jQuery.jqplot.PieRenderer,
                    rendererOptions: {
                        // Put data labels on the pie slices.
                        // By default, labels show the percentage of the slice.
                        showDataLabels: true
                    }
                },
                legend: {
                    show: true,
                    location: 'e'
                }
            });

        });
    </script>

<?php
} ?>



<?php if (isset($estatisticas_financeiro) && $estatisticas_financeiro != null && $this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) {
    if ($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null) {
        ?>
        <script type="text/javascript">
            $(document).ready(function() {

                var data2 = [
                    ['Total Receitas', <?php echo ($estatisticas_financeiro->total_receita != null) ?  $estatisticas_financeiro->total_receita : '0.00'; ?>],
                    ['Total Despesas', <?php echo ($estatisticas_financeiro->total_despesa != null) ?  $estatisticas_financeiro->total_despesa : '0.00'; ?>]
                ];
                var plot2 = jQuery.jqplot('chart-financeiro', [data2], {

                    seriesColors: ["#9ACD32", "#FF8C00", "#EAA228", "#579575", "#839557", "#958c12", "#953579", "#4b5de4", "#d8b83f", "#ff5800", "#0085cc"],
                    seriesDefaults: {
                        // Make this a pie chart.
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: {
                            // Put data labels on the pie slices.
                            // By default, labels show the percentage of the slice.
                            dataLabels: 'value',
                            showDataLabels: true
                        }
                    },
                    legend: {
                        show: true,
                        location: 'e'
                    }
                });


                var data3 = [
                    ['Total Receitas', <?php echo ($estatisticas_financeiro->total_receita_pendente != null) ?  $estatisticas_financeiro->total_receita_pendente : '0.00'; ?>],
                    ['Total Despesas', <?php echo ($estatisticas_financeiro->total_despesa_pendente != null) ?  $estatisticas_financeiro->total_despesa_pendente : '0.00'; ?>]
                ];
                var plot3 = jQuery.jqplot('chart-financeiro2', [data3], {

                        seriesColors: ["#90EE90", "#FF0000", "#EAA228", "#579575", "#839557", "#958c12", "#953579", "#4b5de4", "#d8b83f", "#ff5800", "#0085cc"],
                        seriesDefaults: {
                            // Make this a pie chart.
                            renderer: jQuery.jqplot.PieRenderer,
                            rendererOptions: {
                                // Put data labels on the pie slices.
                                // By default, labels show the percentage of the slice.
                                dataLabels: 'value',
                                showDataLabels: true
                            }
                        },
                        legend: {
                            show: true,
                            location: 'e'
                        }
                    }

                );


                var data4 = [
                    ['Total em Caixa', <?php echo ($estatisticas_financeiro->total_receita - $estatisticas_financeiro->total_despesa); ?>],
                    ['Total a Entrar', <?php echo ($estatisticas_financeiro->total_receita_pendente - $estatisticas_financeiro->total_despesa_pendente); ?>]
                ];
                var plot4 = jQuery.jqplot('chart-financeiro-caixa', [data4], {

                        seriesColors: ["#839557", "#d8b83f", "#d8b83f", "#ff5800", "#0085cc"],
                        seriesDefaults: {
                            // Make this a pie chart.
                            renderer: jQuery.jqplot.PieRenderer,
                            rendererOptions: {
                                // Put data labels on the pie slices.
                                // By default, labels show the percentage of the slice.
                                dataLabels: 'value',
                                showDataLabels: true
                            }
                        },
                        legend: {
                            show: true,
                            location: 'e'
                        }
                    }

                );


            });
        </script>

<?php
    }
} ?>