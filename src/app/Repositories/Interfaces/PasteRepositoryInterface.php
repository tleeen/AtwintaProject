<?php

namespace App\Repositories\Interfaces;
use App\DTO\PasteDTO;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator;

    /**
     * @param string $id
     * @return Model
     */
    public function getById(string $id): Model;

    /**
     * @return Collection
     */
    public function getLast(): Collection;

    /**
     * @param PasteDTO $DTO
     * @return Model
     */
    public function store(PasteDTO $DTO): Model;
}
