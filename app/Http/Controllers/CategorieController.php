<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Repositories\CategorieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CategorieController extends AppBaseController
{
    /** @var CategorieRepository $categorieRepository*/
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepo)
    {
        $this->categorieRepository = $categorieRepo;
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.edit')->only('edit','update');
        $this->middleware('can:categories.create')->only('create','store');
        $this->middleware('can:categories.destroy')->only('destroy');
    }

    /**
     * Display a listing of the Categorie.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categorieRepository->all();

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Categorie.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Categorie in storage.
     *
     * @param CreateCategorieRequest $request
     *
     * @return Response
     */
    public function store(CreateCategorieRequest $request)
    {
        $input = $request->all();

        $categorie = $this->categorieRepository->create($input);

        Flash::success('Categorie saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Categorie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('categorie', $categorie);
    }

    /**
     * Show the form for editing the specified Categorie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('categorie', $categorie);
    }

    /**
     * Update the specified Categorie in storage.
     *
     * @param int $id
     * @param UpdateCategorieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategorieRequest $request)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        $categorie = $this->categorieRepository->update($request->all(), $id);

        Flash::success('Categorie updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Categorie from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error('Categorie not found');

            return redirect(route('categories.index'));
        }

        $this->categorieRepository->delete($id);

        Flash::success('Categorie deleted successfully.');

        return redirect(route('categories.index'));
    }
}
