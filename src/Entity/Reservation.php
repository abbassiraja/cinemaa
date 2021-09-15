<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_tickets;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_reservation;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_film;

    /**
     * @ORM\OneToOne(targetEntity=cinema::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_cinema;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrTickets(): ?int
    {
        return $this->nbr_tickets;
    }

    public function setNbrTickets(int $nbr_tickets): self
    {
        $this->nbr_tickets = $nbr_tickets;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getIdFilm(): ?Film
    {
        return $this->id_film;
    }

    public function setIdFilm(?Film $id_film): self
    {
        $this->id_film = $id_film;

        return $this;
    }

    public function getIdCinema(): ?cinema
    {
        return $this->id_cinema;
    }

    public function setIdCinema(cinema $id_cinema): self
    {
        $this->id_cinema = $id_cinema;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
