<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Query\Expr\Join;


class MoviesController extends AbstractController
{
    #[Route('/api/movies')]
    public function list(Connection $db): Response
    {
        $rows = $db->createQueryBuilder()
            ->select("m.*")
            ->from("movies", "m")
            ->orderBy("m.release_date", "DESC")
            ->orderBy("m.rating", "DESC")
            ->setMaxResults(50)
            ->executeQuery()
            ->fetchAllAssociative();

        return $this->json([
            "movies" => $rows
        ]);
    }

    #[Route('/api/movies/genre/{genre}')]
    public function listFiltered(Connection $db, $genre): Response
    {
        $query = $db->createQueryBuilder()
            ->select("m.*")
            ->from("movies", "m")
            ->innerJoin('m', 'movies_genres', 'mg', 'mg.movie_id = m.id')
            ->where('mg.genre_id = :genre')
            ->setParameter('genre', $genre)
            ->setMaxResults(50)
            ->executeQuery()
            ->fetchAllAssociative();

        return $this->json([
            "filtered" => $query
        ]);
    }

    #[Route('/api/genres')]
    public function getGenres(Connection $db)
    {
        $genres = $db->createQueryBuilder()
            ->select("g.*")
            ->from("genres", "g")
            ->executeQuery()
            ->fetchAllAssociative();

        return $this->json([
            "genres" => $genres
        ]);
    }
}
