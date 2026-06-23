<?php

class Note{
    private string $filePath;
    public function __construct(){
        $this->filePath = __DIR__ .'/../data/notes.json';
    }
    public function getAll(): array{
        $content = file_get_contents($this->filePath);
        return json_decode($content, true) ?? [];
    }
    public function save(array $note): void{
        file_put_contents($this->filePath, json_encode($note, JSON_PRETTY_PRINT));
    }
    public function create(string $title, string $content): array{
        $notes = $this->getAll();
        $newNote = ["id" => count($notes) + 1, "title" => $title, "content" => $content];
        $notes[] = $newNote;
        $this->save($notes);
        return $newNote;
    }
    public function findById(int $id): ?array{
        $notes = $this->getAll();
        foreach ($notes as $note){
            if ($note['id'] === $id){
                return $note;
            }
        }
        return null;
    }
    public function update(int $id, string $title, string $content): ?array{
        $notes = $this->getAll();
        foreach ($notes as $index => $note){
            if ($note['id'] === $id){
                $notes[$index]['title'] = $title;
                $notes[$index]['content'] = $content;
                $this->save($notes);
                return $notes[$index];
            }
        }
        return null;
    }
    public function delete(int $id): bool{
        $notes = $this->getAll();
        foreach ($notes as $index => $note){
            if ($note['id'] === $id){
                unset($notes[$index]);
                $this->save(array_values($notes));
                return true;
            }
        }
        return false;
    }
}