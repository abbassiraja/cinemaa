<?php

namespace App\Entity;

use App\Repository\CinemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CinemaRepository::class)
 */
class Cinema
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
    private $nom_cinema;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mot_de_passe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Publicite::class, mappedBy="id_cinema")
     */
    private $publicites;

    /**
     * @ORM\OneToMany(targetEntity=Evaluation::class, mappedBy="id_cinema")
     */
    private $evaluations;

    /**
     * @ORM\OneToMany(targetEntity=SalleDeProjection::class, mappedBy="id_cinema")
     */
    private $salleDeProjections;

    public function __construct()
    {
        $this->publicites = new ArrayCollection();
        $this->evaluations = new ArrayCollection();
        $this->salleDeProjections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCinema(): ?string
    {
        return $this->nom_cinema;
    }

    public function setNomCinema(string $nom_cinema): self
    {
        $this->nom_cinema = $nom_cinema;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->num_tel;
    }

    public function setNumTel(int $num_tel): self
    {
        $this->num_tel = $num_tel;

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

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): self
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Publicite[]
     */
    public function getPublicites(): Collection
    {
        return $this->publicites;
    }

    public function addPublicite(Publicite $publicite): self
    {
        if (!$this->publicites->contains($publicite)) {
            $this->publicites[] = $publicite;
            $publicite->setIdCinema($this);
        }

        return $this;
    }

    public function removePublicite(Publicite $publicite): self
    {
        if ($this->publicites->removeElement($publicite)) {
            // set the owning side to null (unless already changed)
            if ($publicite->getIdCinema() === $this) {
                $publicite->setIdCinema(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evaluation[]
     */
    public function getEvaluations(): Collection
    {
        return $this->evaluations;
    }

    public function addEvaluation(Evaluation $evaluation): self
    {
        if (!$this->evaluations->contains($evaluation)) {
            $this->evaluations[] = $evaluation;
            $evaluation->setIdCinema($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluation $evaluation): self
    {
        if ($this->evaluations->removeElement($evaluation)) {
            // set the owning side to null (unless already changed)
            if ($evaluation->getIdCinema() === $this) {
                $evaluation->setIdCinema(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SalleDeProjection[]
     */
    public function getSalleDeProjections(): Collection
    {
        return $this->salleDeProjections;
    }

    public function addSalleDeProjection(SalleDeProjection $salleDeProjection): self
    {
        if (!$this->salleDeProjections->contains($salleDeProjection)) {
            $this->salleDeProjections[] = $salleDeProjection;
            $salleDeProjection->setIdCinema($this);
        }

        return $this;
    }

    public function removeSalleDeProjection(SalleDeProjection $salleDeProjection): self
    {
        if ($this->salleDeProjections->removeElement($salleDeProjection)) {
            // set the owning side to null (unless already changed)
            if ($salleDeProjection->getIdCinema() === $this) {
                $salleDeProjection->setIdCinema(null);
            }
        }

        return $this;
    }
}
