import React, { useCallback, useEffect, useState } from 'react';
import { Button, Rating, Spinner, Dropdown } from 'flowbite-react';

const Index = props => {
  const [movies, setMovies] = useState([]);
  const [genres, setGenres] = useState([]);
  const [loading, setLoading] = useState(true);

  const fetchMovies = useCallback(() => {
    setLoading(true);

    fetch("/api/movies")
      .then((res) => res.json())
      .then((res) => {
        setMovies(res.movies);
        setLoading(false);
        setLoading(false);
      }) 
      .catch((error) => {
        console.error("error /api/movies", error);
        setLoading(false);
      });
  }, [setLoading, setMovies]);

  const fetchGenres = useCallback(() => {
    fetch("/api/genres")
      .then((res) => res.json())
      .then((res) => {
        setGenres(res.genres);
      })
      .catch((error) => {
        console.error("error /api/genres", error);
      });
  }, [setGenres]);

  const fetchFilteredMovies = useCallback((value) => {
    fetch(`api/movies/genre/${value}`)
      .then((res) => res.json())
      .then((res) => {
        console.log("res.filtered", res.filtered);
        setMovies(res.filtered);
      })
      .catch((error) => {
        console.error("error /api/movies/genre", error);
      });
  }, [setMovies]);

  const handleClick = useCallback((id) => {
    console.log('id', id);
    fetchFilteredMovies(id);
  }, [fetchFilteredMovies]);

  useEffect(() => {
    fetchMovies();
    fetchGenres();

    return () => {
      setMovies([]);
      setGenres([]);
    }
  }, []);

  return (
    <Layout>
      <Heading />
      <Dropdown
        label="Genres"
        dismissOnClick={false}
      >

        {genres.map((item, key) => (
          <DropdownItem key={key} {...item} onChange={() => handleClick(item.id)}
          />
        ))}
      </Dropdown>

      <br></br>
      <MovieList loading={loading}>
        {movies.map((item, key) => (
          <MovieItem key={key} {...item} />
        ))}
      </MovieList>
    </Layout>
  )
};

const DropdownItem = props => {
  return (
    <Dropdown.Item
      onChange={props.onChange}
    >
      {props.id}
    </Dropdown.Item>
  );
};

const Layout = props => {
  return (
    <section className="bg-white dark:bg-gray-900">
      <div className="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        {props.children}
      </div>
    </section>
  );
};

const Heading = props => {
  return (
    <div className="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h1 className="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
        Movie Collection
      </h1>

      <p className="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
        Explore the whole collection of movies
      </p>
    </div>
  );
};

const MovieList = props => {
  if (props.loading) {
    return (
      <div className="text-center">
        <Spinner size="xl" />
      </div>
    );
  }

  return (
    <div className="grid gap-4 md:gap-y-8 xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3">
      {props.children}
    </div>
  );
};

const MovieItem = props => {
  return (

    <div className="flex flex-col w-full h-full rounded-lg shadow-md lg:max-w-sm">
      <div className="grow">
        <img
          className="object-cover w-full h-60 md:h-80"
          src={props.image}
          alt={props.title}
          loading="lazy"
        />
      </div>

      <div className="grow flex flex-col h-full p-3">
        <div className="grow mb-3 last:mb-0">
          {props.year || props.rating
            ? <div className="flex justify-between align-middle text-gray-900 text-xs font-medium mb-2">
              <span>{props.year}</span>

              {props.rating
                ? <Rating>
                  <Rating.Star />

                  <span className="ml-0.5">
                    {props.rating}
                  </span>
                </Rating>
                : null
              }
            </div>
            : null
          }

          <h3 className="text-gray-900 text-lg leading-tight font-semibold mb-1">
            {props.title}
          </h3>

          <p className="text-gray-600 text-sm leading-normal mb-4 last:mb-0">
            {props.plot.substr(0, 80)}...
          </p>
        </div>

        {props.wikipedia_url
          ? <Button
            color="light"
            size="xs"
            className="w-full"
            onClick={() => window.open(props.wikipedia_url, '_blank')}
          >
            More
          </Button>
          : null
        }
      </div>
    </div>
  );
};

export default Index;
