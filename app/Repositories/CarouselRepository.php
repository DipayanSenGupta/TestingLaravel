<?php
namespace App\Repositories;
use App\Carousel;
use App\Shop\Carousels\Exceptions\CarouselNotFoundException;
use App\Exceptions\CreateCarouselErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * 
 */
class CarouselRepository
{
	
	function __construct(Carousel $carousel)
	{
		$this->model = $carousel;
	}

	public function CreateCarousel(array $data) : Carousel
	{
		try{
			return $this->model->create($data);
		} catch(QueryException $e) {
			throw new CreateCarouselErrorException($e);
		}
	}

  public function findCarousel(int $id) : Carousel
  {
      try {
          return $this->model->findOrFail($id);
      } catch (ModelNotFoundException $e) {
          throw new CarouselNotFoundException($e);
    }
  }

  public function updateCarousel(array $data) : bool
  {
      try {
          return $this->model->update($data);
      } catch (QueryException $e) {
          throw new UpdateCarouselErrorException($e);
      }
  }
   public function deleteCarousel() : bool
    {
        return $this->model->delete();
    }
  /** @test */
  public function it_can_delete_the_carousel()
  {
      $carousel = factory(Carousel::class)->create();
    
      $carouselRepo = new CarouselRepository($carousel);
      $delete = $carouselRepo->deleteCarousel();
      
      $this->assertTrue($delete);
  }

}