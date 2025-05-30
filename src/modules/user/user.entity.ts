/* eslint-disable prettier/prettier */
import { Entity, PrimaryGeneratedColumn, Column, OneToMany } from 'typeorm';
// Update the import path if the file is named 'task.entity.ts' in the 'task' folder
import { Task } from '../task/task.entity';

@Entity()
export class User {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  username: string;

  @Column({ unique: true })
  email: string;

  @Column()
  password: string;

  // eslint-disable-next-line @typescript-eslint/no-unsafe-return
  @OneToMany(() => Task, (task: Task) => task.user)
  tasks: Task[];
}
