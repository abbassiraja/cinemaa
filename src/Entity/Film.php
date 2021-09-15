<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_film;

    /**
     * @ORM\Column(type="datetime")
     */
    private $time;

    /**
     * @ORM\Column(type="time")
     */
    private $dure;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_film;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $audience;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="films")
     */
    private $id_categorie;

   

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="films")
     */
    private $id_admin;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="id_film")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="id_film")
     */
    private $commentaires;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFilm(): ?string
    {
        return $this->nom_film;
    }

    public function setNomFilm(string $nom_film): self
    {
        $this->nom_film = $nom_film;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDure(): ?\DateTimeInterface
    {
        return $this->dure;
    }

    public function setDure(\DateTimeInterface $dure): self
    {
        $this->dure = $dure;

        return $this;
    }

    public function getPrixFilm(): ?int
    {
        return $this->prix_film;
    }

    public function setPrixFilm(int $prix_film): self
    {
        $this->prix_film = $prix_film;

        return $this;
    }

    public function getAudience(): ?string
    {
        return $this->audience;
    }

    public function setAudience(string $audience): self
    {
        $this->audience = $audience;

        return $this;
    }

    public function getIdCategorie(): ?Categorie
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(?Categorie $id_categorie): self
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }



    public function getIdAdmin(): ?Admin
    {
        return $this->id_admin;
    }

    public function setIdAdmin(?Admin $id_admin): self
    {
        $this->id_admin = $id_admin;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setIdFilm($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getIdFilm() === $this) {
                $reservation->setIdFilm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setIdFilm($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdFilm() === $this) {
                $commentaire->setIdFilm(null);
            }
        }

        return $this;
    }
}
