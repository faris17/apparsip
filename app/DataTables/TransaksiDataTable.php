<?php

namespace App\DataTables;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransaksiDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $action = '';

                $action .= '<a href="' . route("transactions.download", $row->id) . '" class="btn btn-sm btn-icon btn-outline-info" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Download">
                        <i class="bi-download"></i>
                     </a> ';

                $action .= '<a href="' . route("transactions.edit", $row->id) . '" class="btn btn-sm btn-icon btn-outline-info" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Edit Data">
                        <i class="bi-pencil"></i>
                     </a>';

                $action .= '<form method="post" action="' . route("transactions.destroy", $row->id) . '"
                    id="deleteJenisSurat" style="display:inline" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Hapus Data">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="btn btn-outline-danger btn-sm btn-icon">
                        <i class="bi-trash"></i>
                    </button></form>';

                return $action;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Transaksi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaksi $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('transaksi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false)->width(20),
            Column::make('nomor_surat'),
            Column::make('maksud_tujuan'),
            Column::make('tanggal_perjalan'),
            Column::make('tanggal_surat_tugas'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Transaksi_' . date('YmdHis');
    }
}
