<?php
    namespace App\DataPersister;
    use App\Entity\Personne;
    use Doctrine\ORM\EntityManagerInterface;

    class PersonneDataPersister implements DataPersisterInterface
    {
        private $entityManager;
        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->entityManager = $entityManager;
        }
        public function supports($data, array $context = []): bool
        {
            return $data instanceof Personne;
        }
        public function persist($data, array $context = [])
        {
            if (($context[’collection_operation_name’] ?? null) === ’post’) {
                $dateTimeZone = new \DateTimeZone(’Europe/Paris’);
                $data->setDateEnregistrement(new \DateTime(’now’,$dateTimeZone));
            }
            $this->entityManager->persist($data);
            $this->entityManager->flush();
        }
        public function remove($data, array $context = [])
        {
            $this->entityManager->remove($data);
            $this->entityManager->flush();
        }
    }
?>